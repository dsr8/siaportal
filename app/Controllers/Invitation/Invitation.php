<?php namespace App\Controllers\Invitation;

use App\Controllers\BaseController;
use App\Models\Invitation\Invitation_model;

// Invitation Received dashboard + its automatic emails. Reads existing application records
// live (see Invitation_model) — there is no separate data entry, linking, or sync step.
class Invitation extends BaseController
{
    // Secret token for the cPanel curl-triggered daily cron (see cron_daily()) — same pattern
    // as Agreement::cron_send_reminders(), with its own token so the cron entries can't be mixed up.
    private const DAILY_CRON_TOKEN = 'SIA_INVITATION_DAILY_CRON';

    private const PER_PAGE_OPTIONS = [25, 50, 100];

    private function isAuthorized(): bool
    {
        return session()->get('isLoggedIn') == true;
    }

    private function today(): string
    {
        return date('Y-m-d');
    }

    private function validDate(?string $value): ?string
    {
        $value = trim((string) $value);
        return preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) ? $value : null;
    }

    public function dashboard()
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        helper('invitation_reminder_email_helper');

        $get = $this->request->getGet();
        $filters = [
            'q'         => trim((string) ($get['q'] ?? '')) ?: null,
            'team'      => (int) ($get['team'] ?? 0) ?: null,
            'date_from' => $this->validDate($get['date_from'] ?? null),
            'date_to'   => $this->validDate($get['date_to'] ?? null),
            'inv'       => in_array($get['inv'] ?? '', ['pending', 'overdue'], true) ? $get['inv'] : null,
            'hidden'    => !empty($get['hidden']) ? 1 : null,
        ];
        $isHidden = !empty($filters['hidden']);

        $perPage = (int) ($get['per_page'] ?? 100);
        $perPage = in_array($perPage, self::PER_PAGE_OPTIONS, true) ? $perPage : 100;

        $today = $this->today();
        $Inv   = new Invitation_model();

        $total      = $Inv->getTotal($filters, $today, $isHidden);
        $totalPages = max(1, (int) ceil($total / $perPage));
        $page       = max(1, min($totalPages, (int) ($get['page'] ?? 1)));
        $rows       = $Inv->attachAgreements($Inv->getList($filters, $page, $perPage, $today, $isHidden));

        return view('invitation/dashboard', [
            'counts'        => $Inv->getCounts($filters, $today),
            'archivedCount' => $Inv->getArchivedCount(),
            'teamMembers'   => $Inv->getTeamMembers(),
            'rows'          => $rows,
            'filters'       => $filters,
            'isHidden'      => $isHidden,
            'page'          => $page,
            'perPage'       => $perPage,
            'perPageOptions'=> self::PER_PAGE_OPTIONS,
            'total'         => $total,
            'totalPages'    => $totalPages,
            'today'         => $today,
        ]);
    }

    // Archive/Hide one or more applications from this dashboard only (and from its reminder
    // and summary emails). The application, its status and its agreements are not touched.
    public function archive()
    {
        if (!$this->isAuthorized() || $this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $ids  = (array) $this->request->getPost('ids');
        $done = (new Invitation_model())->archiveMany($ids, (int) session()->get('id'));

        return redirect()->to(base_url('invitation/Invitation/dashboard'))
            ->with($done ? 'message' : 'error', $done ? $done . ' application(s) hidden from the Invitation Received dashboard.' : 'Nothing was hidden — select at least one application.');
    }

    public function restore()
    {
        if (!$this->isAuthorized() || $this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $ids  = (array) $this->request->getPost('ids');
        $done = (new Invitation_model())->restoreMany($ids);

        return redirect()->to(base_url('invitation/Invitation/dashboard?hidden=1'))
            ->with($done ? 'message' : 'error', $done ? $done . ' application(s) restored to the dashboard.' : 'Nothing was restored — select at least one application.');
    }

    // URL-triggered daily cron (no login; token-gated) — schedule once every morning, e.g.
    //   0 8 * * * curl -s "https://<siaportal>/invitation/Invitation/cron_daily?token=SIA_INVITATION_DAILY_CRON"
    // 1. Individual reminders to the assigned team member exactly 7, 3 and 1 day(s) before the
    //    tentative submission date.
    // 2. One consolidated summary to management.
    // Both read the same live, non-archived Invitation Received rows. Every email is reserved in
    // tbl_invitation_email_log before sending, so re-running the cron (or two overlapping runs)
    // never sends the same reminder/summary twice; a failed send releases its reservation.
    public function cron_daily()
    {
        if ($this->request->getGet('token') !== self::DAILY_CRON_TOKEN) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        set_time_limit(0);
        helper('invitation_reminder_email_helper');

        $today = $this->today();
        $Inv   = new Invitation_model();
        $log   = [];

        // ── 1. Individual reminders ──
        $due = $Inv->attachAgreements($Inv->getDueForReminder($today));
        $sent = 0;
        foreach ($due as $row) {
            $days = sia_inv_days_left($row['invitation_date_tantative'], $today);
            $type = Invitation_model::REMINDER_DAYS[$days] ?? null;
            if ($type === null) {
                continue;
            }

            // Goes to the assigned team member; if none is assigned (or no valid email is on
            // file) it goes to the whole team list instead, so the reminder is never lost.
            $to = trim((string) $row['team_member_email']);
            $to = filter_var($to, FILTER_VALIDATE_EMAIL) ? $to : sia_inv_team_emails();

            if (!$Inv->claimEmail($type, (int) $row['id'], $row['invitation_date_tantative'], implode(',', (array) $to))) {
                continue; // already sent for this tentative date
            }

            if (sia_inv_send($to, sia_inv_reminder_subject($row, $days), sia_inv_reminder_html($row, $days, $today))) {
                $sent++;
            } else {
                $Inv->releaseEmail($type, (int) $row['id'], $row['invitation_date_tantative']);
                $log[] = 'FAILED application #' . $row['id'] . ' (' . $days . '-day) to ' . implode(',', (array) $to);
            }
        }
        $log[] = $sent . ' reminder(s) sent (' . count($due) . ' due today).';

        // ── 2. Daily management summary ──
        $recipients = sia_inv_team_emails();
        if (!$Inv->claimEmail('daily_summary', 0, $today, implode(',', $recipients))) {
            $log[] = 'Daily summary already sent today.';
        } else {
            $rows = $Inv->attachAgreements($Inv->getAllActive($today));
            $overdue = count(array_filter($rows, static fn ($r) => $r['invitation_status'] === 'overdue'));
            $counts = ['total' => count($rows), 'pending' => count($rows) - $overdue, 'overdue' => $overdue];

            if (sia_inv_send($recipients, sia_inv_summary_subject($counts, $today), sia_inv_summary_html($rows, $today))) {
                $log[] = 'Daily summary sent (' . $counts['total'] . ' application(s)).';
            } else {
                $Inv->releaseEmail('daily_summary', 0, $today);
                $log[] = 'FAILED to send the daily summary.';
            }
        }

        foreach ($log as $line) {
            if (strpos($line, 'FAILED') === 0) {
                log_message('error', '[InvitationCron] ' . $line);
            }
        }

        return $this->response->setBody(implode("\n", $log));
    }
}

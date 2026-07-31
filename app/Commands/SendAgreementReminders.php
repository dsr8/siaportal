<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Agreement\Agreement_model;

// Automatic "Client – Reminder" email cron for the Agreement module: fixed ladder of 1st
// reminder at 24h, 2nd at 3 days, 3rd at 7 days after the agreement was sent (see
// Agreement_model::getDueForReminder()) — stops automatically once the agreement is Signed or
// Declined, since those statuses fall outside that query entirely.
//
// Nothing in this app calls this on its own — an actual OS-level scheduler (Windows Task
// Scheduler in dev, cron in production) must invoke `php spark agreement:sendreminders` once a
// day. Run it manually any time to test without waiting for a scheduled trigger.
class SendAgreementReminders extends BaseCommand
{
    protected $group       = 'Agreement';
    protected $name        = 'agreement:sendreminders';
    protected $description = 'Sends the "Retainer Agreement Pending" reminder email on the fixed 24h/3d/7d ladder, stopping once the agreement is signed or declined.';

    public function run(array $params)
    {
        helper('agreement_email_helper');

        $AgreementModel = new Agreement_model();
        $due = $AgreementModel->getDueForReminder();

        if (empty($due)) {
            CLI::write('No agreements are due for a reminder right now.', 'yellow');
            return;
        }

        foreach ($due as $agreement) {
            $signUrl = base_url('agreement/sign/' . $agreement['sign_token']);

            try {
                sia_send_agreement_reminder_email($agreement, $signUrl);
                $AgreementModel->update($agreement['id'], [
                    'reminders_sent'   => (int) $agreement['reminders_sent'] + 1,
                    'last_reminder_at' => date('Y-m-d H:i:s'),
                ]);
                CLI::write('Reminder sent: agreement #' . $agreement['id'] . ' (' . $agreement['client_email'] . ')', 'green');
            } catch (\Throwable $e) {
                log_message('error', '[SendAgreementReminders] Agreement #' . $agreement['id'] . ': ' . $e->getMessage());
                CLI::error('Failed: agreement #' . $agreement['id'] . ' — ' . $e->getMessage());
            }
        }

        CLI::write((count($due)) . ' reminder(s) processed.', 'green');
    }
}

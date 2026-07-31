<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Agreement\Agreement_model;

// Backup/safety-net only: Sign::index() now sends the Team - Agreement Viewed email
// synchronously the moment the client opens the link (reliable, no scheduler required) and
// stamps viewed_notified_at at the same time. This command is a no-op for anything sent that
// way — it only picks up rows that somehow ended up "viewed" without a notification (e.g. a
// pre-existing/legacy row, or a future code path that sets status directly). Harmless to run
// on a schedule if you want the extra safety net; not required for normal operation.
//   php spark agreement:sendviewednotifications
class SendAgreementViewedNotifications extends BaseCommand
{
    protected $group       = 'Agreement';
    protected $name        = 'agreement:sendviewednotifications';
    protected $description = 'Sends the internal "Team - Agreement Viewed" email for agreements still sitting in "viewed" status after a short debounce window (skipped if the client signed/declined first).';

    // How long to wait after viewed_at before deciding the client isn't about to sign right
    // away. Short enough that the team still hears about it promptly, long enough to absorb
    // "opened the link and signed within a minute or two."
    private const DEBOUNCE_MINUTES = 5;

    public function run(array $params)
    {
        helper('agreement_email_helper');

        $AgreementModel = new Agreement_model();
        $due = $AgreementModel->getDueForViewedNotification(self::DEBOUNCE_MINUTES);

        if (empty($due)) {
            CLI::write('No agreements are due for a viewed notification right now.', 'yellow');
            return;
        }

        foreach ($due as $agreement) {
            try {
                sia_send_agreement_viewed_email($agreement);
                $AgreementModel->update($agreement['id'], ['viewed_notified_at' => date('Y-m-d H:i:s')]);
                CLI::write('Viewed notification sent: agreement #' . $agreement['id'], 'green');
            } catch (\Throwable $e) {
                log_message('error', '[SendAgreementViewedNotifications] Agreement #' . $agreement['id'] . ': ' . $e->getMessage());
                CLI::error('Failed: agreement #' . $agreement['id'] . ' — ' . $e->getMessage());
            }
        }

        CLI::write(count($due) . ' viewed notification(s) processed.', 'green');
    }
}

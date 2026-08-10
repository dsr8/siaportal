<?php
// Shared "Retainer Agreement" list-row card — matches the approved mockup
// (design-reference/agreement/07-crm-prospect-list-card-states.jpeg /
// 09-crm-prospect-4-state-comparison.jpeg): one card per application, themed by
// status, with the fee breakdown + Total Payable + status pill + action button(s).
// Used by both view_prospect.php and view_client.php so the two can't drift apart
// the way the old plain-badge version did.
//
// Expects: $agRow (agreement row array or null), $applicationId (int),
// $categoryLabel (string), $typeLabel (string).

$agCardTheme = [
    'draft'     => ['bg' => '#f4f5f7', 'border' => '#e2e3e5', 'pill' => '#6c757d'],
    'sent'      => ['bg' => '#fdf6e3', 'border' => '#f5e3ab', 'pill' => '#f5a623'],
    'viewed'    => ['bg' => '#eaf2fe', 'border' => '#cfe2ff', 'pill' => '#3b82f6'],
    'signed'    => ['bg' => '#eaf7ef', 'border' => '#c3e6cb', 'pill' => '#2ecc71'],
    'declined'  => ['bg' => '#fbeaec', 'border' => '#f1c0c5', 'pill' => '#e23b3b'],
    'cancelled' => ['bg' => '#fbeaec', 'border' => '#f1c0c5', 'pill' => '#e23b3b'],
];
?>
<?php if (!$agRow): ?>
    <div style="background:#f4f5f7;border:1px solid #e2e3e5;border-radius:6px;padding:14px 10px;text-align:center;min-width:200px;">
        <div style="font-size:11.5px;font-weight:700;color:#41464b;">No Agreement</div>
        <div style="font-size:10.5px;color:#9aa0aa;margin-bottom:8px;">(Not Created Yet)</div>
        <form method="post" target="_blank" action="<?php echo base_url('agreement/Agreement/start_from_application/' . (int) $applicationId); ?>" style="margin:0;" onsubmit="this.querySelector('button').disabled = true;">
            <button type="submit" style="display:inline-block;background:#fff;color:#1a73e8;border:1px solid #1a73e8;border-radius:4px;padding:5px 12px;font-size:11px;font-weight:600;cursor:pointer;">+ Create Agreement</button>
        </form>
    </div>
<?php else:
    $theme = $agCardTheme[$agRow['status']] ?? $agCardTheme['draft'];
    $govtFeeTotal = array_sum(array_column(\App\Libraries\Agreement\AgreementClauses::governmentFeeLines($agRow), 'amount'));
    $agMoney = function ($amount) use ($agRow) {
        return esc($agRow['currency'] ?? 'CAD') . ' $' . number_format((float) $amount, 2);
    };
?>
    <div style="background:<?php echo $theme['bg']; ?>;border:1px solid <?php echo $theme['border']; ?>;border-radius:6px;padding:10px 12px;min-width:210px;font-size:11px;">
        <div style="font-weight:700;color:#1f2430;margin-bottom:6px;">Retainer Agreement</div>
        <div style="color:#555;">Category: <b style="color:#1f2430;"><?php echo esc($categoryLabel ?: '—'); ?></b></div>
        <div style="color:#555;">Type / Service Type: <b style="color:#1f2430;"><?php echo esc($typeLabel ?: '—'); ?></b></div>
        <div style="color:#555;">Service Fee: <b style="color:#1f2430;"><?php echo $agMoney($agRow['service_fee'] ?? 0); ?></b></div>
        <div style="color:#555;">GST (<?php echo esc($agRow['gst_rate'] ?? 5); ?>%): <b style="color:#1f2430;"><?php echo $agMoney($agRow['gst_amount'] ?? 0); ?></b></div>
        <div style="color:#555;">Govt. Fee: <b style="color:#1f2430;"><?php echo $agMoney($govtFeeTotal); ?></b></div>
        <hr style="margin:6px 0;border-top:1px dashed <?php echo $theme['border']; ?>;">
        <div style="font-weight:700;color:#1f2430;">Total Payable: <?php echo $agMoney($agRow['total_amount'] ?? 0); ?></div>
        <div style="margin-top:4px;">Status:
            <span style="display:inline-block;background:<?php echo $theme['pill']; ?>;color:#fff;font-size:10px;font-weight:700;padding:2px 8px;border-radius:10px;"><?php echo esc(ucfirst($agRow['status'])); ?></span>
        </div>
        <div style="margin-top:8px;display:flex;flex-direction:column;gap:5px;">
        <?php if ($agRow['status'] === 'signed'): ?>
            <a target="_blank" href="<?php echo base_url('agreement/Agreement/detail/' . (int) $agRow['id']); ?>" style="display:block;text-align:center;background:#fff;color:#2ecc71;border:1px solid #2ecc71;border-radius:4px;padding:5px 10px;font-size:11px;font-weight:600;text-decoration:none;">&#128065; View Agreement</a>
            <a target="_blank" href="<?php echo base_url('agreement/Agreement/pdf/' . (int) $agRow['id']); ?>" style="display:block;text-align:center;background:#fff;color:#1a73e8;border:1px solid #1a73e8;border-radius:4px;padding:5px 10px;font-size:11px;font-weight:600;text-decoration:none;">&#11015; Download PDF</a>
        <?php else: ?>
            <form method="post" target="_blank" action="<?php echo base_url('agreement/Agreement/start_from_application/' . (int) $applicationId); ?>" style="margin:0;" onsubmit="this.querySelector('button').disabled = true;">
                <button type="submit" style="display:block;width:100%;background:#fff;color:#1a73e8;border:1px solid #1a73e8;border-radius:4px;padding:5px 10px;font-size:11px;font-weight:600;cursor:pointer;">+ Create Agreement</button>
            </form>
        <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

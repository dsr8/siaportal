<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Enter Access Code - SIA Immigration eSign</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/public/assets_client/img/favicon.png" />
        <style>
            :root { --sg-red: #e23b3b; }
            * { box-sizing: border-box; }
            body { margin: 0; font-family: 'Segoe UI', Arial, sans-serif; color: #1f2430; background: #f4f5f7; }

            .sg-topbar { background: #fff; border-bottom: 1px solid #eceef1; }
            .sg-topbar-inner { max-width: 1180px; margin: 0 auto; padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; }
            .sg-brand img { height: 40px; }
            .sg-rcic-badge { color: var(--sg-red); font-weight: 800; font-size: 15px; border: 2px solid var(--sg-red); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; }
            .sg-gradient-bar { height: 4px; background: linear-gradient(90deg,#e23b3b,#f39c12,#2ecc71,#3498db,#8e44ad); }

            .sg-gate-wrap { max-width: 420px; margin: 60px auto; padding: 0 20px; }
            .sg-gate-card { background: #fff; border-radius: 14px; padding: 30px 28px; box-shadow: 0 2px 10px rgba(20,20,43,0.05); text-align: center; }
            .sg-gate-card h4 { margin: 0 0 8px; font-size: 17px; }
            .sg-gate-card p { font-size: 13px; color: #6b7280; margin: 0 0 20px; }
            .sg-gate-card input[type="text"] { width: 100%; padding: 12px 14px; border: 1px solid #d8dce1; border-radius: 8px; font-size: 20px; text-align: center; letter-spacing: 4px; margin-bottom: 16px; }
            .sg-gate-card button { width: 100%; padding: 12px; border: none; border-radius: 8px; background: var(--sg-red); color: #fff; font-size: 14px; font-weight: 700; cursor: pointer; }
            .sg-alert-error { background: #fdecec; color: #c0392b; border: 1px solid #f5c6c2; border-radius: 10px; padding: 10px 14px; font-size: 13px; margin-bottom: 16px; text-align: left; }
        </style>
    </head>
    <body>
        <div class="sg-topbar">
            <div class="sg-topbar-inner">
                <div class="sg-brand">
                    <img src="<?php echo base_url();?>/public/assets_client/img/sia_logo.png" alt="SIA Immigration">
                </div>
                <div class="sg-rcic-badge">RCIC</div>
            </div>
        </div>
        <div class="sg-gradient-bar"></div>

        <div class="sg-gate-wrap">
            <div class="sg-gate-card">
                <h4>Enter Access Code</h4>
                <p>Please enter the access code from your email to view and sign this agreement.</p>
                <?php if (!empty($gateError)): ?>
                    <div class="sg-alert-error"><?php echo esc($gateError); ?></div>
                <?php endif; ?>
                <form method="post" action="<?php echo base_url('agreement/sign/' . $token . '/unlock'); ?>">
                    <input type="text" name="password" inputmode="numeric" maxlength="10" autofocus placeholder="000000" required>
                    <button type="submit">Continue</button>
                </form>
            </div>
        </div>
    </body>
</html>

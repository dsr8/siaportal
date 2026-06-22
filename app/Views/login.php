<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Siaportal</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            min-height: 100vh;
            background: #f4f6f5;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            position: relative;
            overflow: hidden;
        }
        /* decorative soft circles */
        body::before, body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 24px solid rgba(180,190,185,0.18);
            pointer-events: none;
        }
        body::before {
            width: 520px; height: 520px;
            top: -160px; right: -160px;
        }
        body::after {
            width: 360px; height: 360px;
            bottom: -140px; right: 10%;
        }
        /* decorative dotted swirl bottom-left */
        .dots-decor {
            position: absolute;
            left: -120px; bottom: -120px;
            width: 480px; height: 480px;
            background-image: radial-gradient(circle, #8bc34a 1.6px, transparent 1.8px);
            background-size: 14px 14px;
            border-radius: 50%;
            transform: rotate(15deg);
            -webkit-mask-image: radial-gradient(circle at 65% 35%, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.5) 55%, transparent 75%);
            mask-image: radial-gradient(circle at 65% 35%, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.5) 55%, transparent 75%);
            opacity: 0.55;
            pointer-events: none;
        }
        .page-wrap {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }
        .login-top {
            background: linear-gradient(135deg, #2e8b3d 0%, #5cb860 100%);
            padding: 30px 32px 22px;
            text-align: center;
            color: #fff;
        }
        .login-top .icon {
            width: 64px; height: 64px;
            background: #fff;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 12px;
            overflow: hidden;
        }
        .login-top .icon img { width: 44px; height: 44px; object-fit: contain; }
        .login-top h1 { font-size: 22px; font-weight: 700; }
        .login-body { padding: 28px 32px 30px; }
        .error-box {
            background: #fde8e8; color: #c0392b;
            border: 1px solid #f5c6c6;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 18px;
            display: flex; align-items: center; gap: 8px;
        }
        .success-box {
            background: #e8f5e9; color: #2e7d32;
            border: 1px solid #c8e6c9;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 18px;
            display: flex; align-items: center; gap: 8px;
        }
        .field { margin-bottom: 18px; }
        .field label {
            display: block;
            font-size: 12px; font-weight: 700;
            color: #555;
            text-transform: uppercase; letter-spacing: 0.5px;
            margin-bottom: 7px;
        }
        .field-wrap { position: relative; }
        .field-wrap .ficon {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%);
            color: #2e8b3d;
            display: flex; align-items: center;
            pointer-events: none;
        }
        .field-wrap .ficon svg { width: 16px; height: 16px; }
        .field input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1.5px solid #e3e6e4;
            border-radius: 8px;
            font-size: 14px; color: #333;
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .field input:focus {
            border-color: #5cb860;
            box-shadow: 0 0 0 3px rgba(92,184,96,0.18);
        }
        .field input[type="password"] { padding-right: 40px; }
        .toggle-eye {
            position: absolute; right: 12px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: #9aa39b;
            display: flex; align-items: center;
            padding: 4px;
        }
        .toggle-eye svg { width: 18px; height: 18px; }
        .btn-login {
            width: 100%;
            background: linear-gradient(90deg, #2e8b3d 0%, #5cb860 100%);
            color: #fff; border: none;
            padding: 13px;
            border-radius: 8px;
            font-size: 15px; font-weight: 700;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: opacity 0.2s, transform 0.1s;
            margin-top: 4px;
        }
        .btn-login:hover  { opacity: 0.92; }
        .btn-login:active { transform: scale(0.98); }
        .divider {
            display: flex; align-items: center; gap: 10px;
            margin-top: 20px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e3e6e4;
        }
        .divider span {
            font-size: 13px; color: #2e8b3d; font-weight: 600;
        }
        .page-footer {
            margin-top: 22px;
            text-align: center;
            font-size: 13px;
            color: #8a8f8c;
        }
        .page-footer .brand { color: #2e8b3d; font-weight: 600; }
    </style>
</head>
<body>
    <div class="dots-decor"></div>
    <div class="page-wrap">
        <div class="login-card">
            <div class="login-top">
                <div class="icon"><img src="<?= base_url('public/assets_client/img/sia_icon.png') ?>" alt="Siaportal"></div>
                <h1>Siaportal</h1>
            </div>
            <div class="login-body">

                <?php if (session()->getFlashdata('login_error')): ?>
                    <div class="error-box">&#9888; <?php echo htmlspecialchars(session()->getFlashdata('login_error')); ?></div>
                <?php endif; ?>

                <?php if (session()->get('success')): ?>
                    <div class="success-box">&#10003; <?php echo session()->get('success'); ?></div>
                <?php endif; ?>

                <?php if (session()->get('login')): ?>
                    <div class="error-box">&#9888; <?php echo htmlspecialchars(session()->get('login')); ?></div>
                <?php endif; ?>

                <?php if (isset($validation)): ?>
                    <div class="error-box">&#9888; <?php echo $validation->listErrors(); ?></div>
                <?php endif; ?>

                <form action="<?= base_url('Siaportal/login') ?>" method="post">
                    <div class="field">
                        <label>Email / Username</label>
                        <div class="field-wrap">
                            <span class="ficon">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.4c-3.3 0-9.8 1.6-9.8 4.9V21h19.6v-1.7c0-3.3-6.5-4.9-9.8-4.9z"/></svg>
                            </span>
                            <input type="text" name="email" placeholder="Enter email or username" required autocomplete="username" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <div class="field-wrap">
                            <span class="ficon">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 8h-1V6a5 5 0 0 0-10 0v2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zM9 6a3 3 0 0 1 6 0v2H9zm3 8a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></svg>
                            </span>
                            <input type="password" id="passwordField" name="password" placeholder="Enter password" required autocomplete="current-password" />
                            <button type="button" class="toggle-eye" id="togglePassword" aria-label="Show password">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn-login">Sign In <span>&rarr;</span></button>
                </form>

                <div class="divider"><span>Siaportal</span></div>
            </div>
        </div>
        <div class="page-footer">&copy; <?= date('Y') ?> <span class="brand">Sia Immigration</span>. All rights reserved.</div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var field = document.getElementById('passwordField');
            field.type = field.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>

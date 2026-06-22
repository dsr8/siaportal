<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Appointment Admin — Login</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 40%, #1976d2 100%);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }
        .login-top {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            padding: 32px 32px 24px;
            text-align: center;
            color: #fff;
        }
        .login-top .icon {
            width: 60px; height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
            font-size: 26px;
        }
        .login-top h1 { font-size: 20px; font-weight: 700; }
        .login-top p  { font-size: 13px; opacity: 0.85; margin-top: 4px; }
        .login-body { padding: 28px 32px 32px; }
        .error-box {
            background: #fde8e8; color: #c0392b;
            border: 1px solid #f5c6c6;
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
            position: absolute; left: 12px; top: 50%;
            transform: translateY(-50%);
            color: #aaa; font-size: 14px; pointer-events: none;
        }
        .field input {
            width: 100%;
            padding: 12px 14px 12px 38px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px; color: #333;
            background: #fafafa;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .field input:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
            background: #fff;
        }
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #fff; border: none;
            padding: 13px;
            border-radius: 8px;
            font-size: 15px; font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
            margin-top: 4px;
        }
        .btn-login:hover  { opacity: 0.92; }
        .btn-login:active { transform: scale(0.98); }
        .hint {
            text-align: center;
            font-size: 12px; color: #aaa;
            margin-top: 18px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-top">
            <div class="icon">&#128197;</div>
            <h1>Appointment Admin</h1>
            <p>SIA Immigration Solutions</p>
        </div>
        <div class="login-body">
            <?php if (!empty($error)): ?>
                <div class="error-box">&#9888; <?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <form method="post" action="">
                <div class="field">
                    <label>Username</label>
                    <div class="field-wrap">
                        <span class="ficon">&#128100;</span>
                        <input type="text" name="username" placeholder="Enter username" required autocomplete="username" />
                    </div>
                </div>
                <div class="field">
                    <label>Password</label>
                    <div class="field-wrap">
                        <span class="ficon">&#128274;</span>
                        <input type="password" name="password" placeholder="Enter password" required autocomplete="current-password" />
                    </div>
                </div>
                <button type="submit" class="btn-login">Sign In &rarr;</button>
            </form>
            <div class="hint">Appointment management portal</div>
        </div>
    </div>
</body>
</html>

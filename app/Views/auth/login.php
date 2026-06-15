<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Secure Portal</title>
    <style>
        :root {
            --primary: #0B2545;
            --primary-hover: #134074;
            --bg: #f4f7f6;
            --card-bg: #ffffff;
            --text-main: #333333;
            --text-muted: #666666;
            --border: #cccccc;
            --success: #1E8449;
            --success-bg: #DFF2BF;
            --error: #D8000C;
            --error-bg: #FFBABA;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .login-container {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: var(--primary);
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 24px;
        }

        /* Sleek Notification Banners */
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-bottom: 20px;
            line-height: 1.4;
        }

        .alert-success {
            color: var(--success);
            background-color: var(--success-bg);
            border: 1px solid rgba(30, 132, 73, 0.15);
        }

        .alert-error {
            color: var(--error);
            background-color: var(--error-bg);
            border: 1px solid rgba(216, 0, 12, 0.12);
        }

        /* Flex Container Forms */
        .form-group {
            margin-bottom: 18px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.95rem;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fafafa;
            color: var(--text-main);
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(11, 37, 69, 0.15);
            background-color: #ffffff;
        }

        /* Modernized Interactive Button */
        button[type="submit"] {
            width: 100%;
            padding: 13px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
            margin-top: 8px;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .register-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <p class="subtitle">Welcome back! Please sign in to your dashboard.</p>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('login/process') ?>" method="post">
        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        
        <button type="submit">Login</button>
    </form>

    <a href="<?= base_url('register') ?>" class="register-link">Don't have an account? Register</a>
</div>

</body>
</html>
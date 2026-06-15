<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure PDF Portal</title>
    <style>
        /* Base Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #0B2545; /* Navy Blue */
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar .brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #ffffff;
            letter-spacing: 1px;
        }

        .navbar .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar .nav-links a {
            color: #e0e0e0;
            text-decoration: none;
            margin-left: 25px;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            color: #F4D03F; /* Gold Accent */
        }

        /* Admin Button in Nav */
        .navbar .nav-links .btn-admin {
            border: 1px solid #e0e0e0;
            padding: 8px 16px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .navbar .nav-links .btn-admin:hover {
            background-color: #ffffff;
            color: #0B2545;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 120px 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            color: #0B2545;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        /* Call to Action Buttons */
        .hero-actions a {
            text-decoration: none;
            font-size: 1.1rem;
            margin: 0 10px;
            padding: 12px 28px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background-color: #1E8449; /* Green */
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #145A32;
        }

        .btn-secondary {
            background-color: transparent;
            color: #0B2545;
            border: 2px solid #0B2545;
        }

        .btn-secondary:hover {
            background-color: #0B2545;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="<?= base_url() ?>" class="brand">PDF Portal</a>
        <div class="nav-links">
            <a href="<?= base_url('register') ?>">Client Register</a>
            <a href="<?= base_url('login') ?>">Client Login</a>
            <!-- Links to the admin upload route built in the previous step -->
            <a href="<?= base_url('admin/login') ?>" class="btn-admin">Admin Access</a>
        </div>
    </nav>

    <!-- Main Hero Section -->
    <div class="hero">
        <h1>Secure Document Access</h1>
        <p>Welcome to our digital file distribution center. Create a client account or log in to securely browse and download your assigned PDF documents.</p>
        
        <div class="hero-actions">
            <a href="<?= base_url('login') ?>" class="btn-primary">Client Login</a>
            <a href="<?= base_url('register') ?>" class="btn-secondary">Create Account</a>
        </div>
    </div>

</body>
</html>
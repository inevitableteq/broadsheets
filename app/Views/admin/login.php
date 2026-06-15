<!DOCTYPE html>
<html>
<head><title>Admin Login</title></head>
<body style="font-family: sans-serif; background: #f4f4f4; text-align: center; padding-top: 100px;">
    <div style="background: white; padding: 40px; display: inline-block; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #0B2545;">Admin Portal</h2>
        
        <?php if (session()->getFlashdata('error')) : ?>
            <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('admin/login/process') ?>" method="post">
            <input type="email" name="email" placeholder="Admin Email" required style="padding: 10px; width: 100%; margin-bottom: 15px;"><br>
            <input type="password" name="password" placeholder="Password" required style="padding: 10px; width: 100%; margin-bottom: 15px;"><br>
            <button type="submit" style="padding: 10px 20px; background: #0B2545; color: white; border: none; cursor: pointer;">Secure Login</button>
        </form>
        <br>
        <a href="<?= base_url('/') ?>" style="color: #666; font-size: 12px;">&larr; Back to Home</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Documents | Secure Portal</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        
        /* Header & Client Profile Bar */
        .profile-bar { display: flex; justify-content: space-between; align-items: center; background-color: #f8f9fa; padding: 12px 20px; border-radius: 6px; margin-bottom: 25px; border-left: 4px solid #0B2545; }
        .welcome-text { margin: 0; font-size: 1.1rem; color: #333; }
        .welcome-text strong { color: #0B2545; }
        
        h2 { color: #0B2545; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-top: 0; }
        
        /* Alerts */
        .alert-error { color: #D8000C; background-color: #FFBABA; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { color: #4F8A10; background-color: #DFF2BF; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        
        /* Table Styles */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; color: #333; font-weight: bold; }
        tr:hover { background-color: #f1f5f9; }
        
        /* Buttons and Links */
        .btn-download { display: inline-block; padding: 8px 12px; background-color: #1E8449; color: white; text-decoration: none; border-radius: 4px; font-size: 0.9rem; transition: background 0.3s; font-weight: 500; }
        .btn-download:hover { background-color: #145A32; }
        .logout-link { color: #D8000C; text-decoration: none; font-weight: bold; padding: 6px 12px; border: 1px solid #D8000C; border-radius: 4px; transition: all 0.3s; }
        .logout-link:hover { background-color: #D8000C; color: white; }
        
        .empty-state { text-align: center; padding: 40px; color: #666; font-style: italic; }
    </style>
</head>
<body>

<div class="container">

    <div class="profile-bar">
        <h3 class="welcome-text">
            Welcome back, <strong><?= esc(session()->get('user_name') ?? 'Client') ?></strong>
        </h3>
        <a href="<?= base_url('logout') ?>" class="logout-link">Log Out</a>
    </div>

    <h2>Available Documents</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Document Name</th>
                <th>Date Uploaded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pdfs) && is_array($pdfs)) : ?>
                <?php foreach ($pdfs as $pdf) : ?>
                    <tr>
                        <td><?= esc($pdf['original_name']) ?></td>
                        
                        <td><?= date('F j, Y, g:i a', strtotime($pdf['created_at'])) ?></td>
                        
                        <td>
                            <a href="<?= base_url('client/download/' . esc($pdf['id'])) ?>" class="btn-download">
                                Download PDF
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="empty-state">No documents are currently available for download.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
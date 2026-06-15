<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body style="font-family: sans-serif; padding: 20px;">
    <div style="display: flex; justify-content: space-between; background: #0B2545; color: white; padding: 15px 20px; border-radius: 5px;">
        <h2 style="margin: 0;">Admin Dashboard</h2>
        <a href="<?= base_url('admin/logout') ?>" style="color: #F4D03F; text-decoration: none; font-weight: bold; margin-top: 5px;">Logout</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green; font-weight: bold;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color:red; font-weight: bold;"><?php print_r(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>

    <div style="margin-top: 30px; background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <h3>Upload New PDF</h3>
        <form action="<?= base_url('admin/upload/save') ?>" method="post" enctype="multipart/form-data">
           <input type="file" name="pdf_file[]" accept="application/pdf" multiple required>
            <button type="submit" style="background: #1E8449; color: white; border: none; padding: 8px 15px; cursor: pointer;">Upload</button>
        </form>
    </div>

    <h3 style="margin-top: 40px;">Manage Uploaded Files</h3>
    <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left;">
        <tr style="background: #eee;">
            <th>ID</th>
            <th>Original File Name</th>
            <th>System Name</th>
            <th>Upload Date</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($pdfs)): ?>
            <?php foreach ($pdfs as $pdf): ?>
                <tr>
                    <td><?= $pdf['id'] ?></td>
                    <td><?= esc($pdf['original_name']) ?></td>
                    <td><?= esc($pdf['file_name']) ?></td>
                    <td><?= esc($pdf['created_at']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/delete/' . $pdf['id']) ?>" onclick="return confirm('Are you sure you want to delete this file?');" style="color: red; text-decoration: none;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align: center;">No PDFs uploaded yet.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
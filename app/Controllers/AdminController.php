<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PdfModel;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class AdminController extends BaseController
{
    // ==========================================
    // AUTHENTICATION METHODS
    // ==========================================

    /**
     * Display the Admin Login view.
     */
    public function login()
    {
        // If already logged in, redirect straight to dashboard
        if (session()->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    /**
     * Process the login attempt.
     */
    public function processLogin()
    {
        // 1. Validate the input to ensure data was actually submitted
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Please provide a valid email and password.');
        }

        $adminModel = new AdminModel();
        $email      = $this->request->getPost('email');
        $password   = (string) $this->request->getPost('password');

        // 2. Fetch the admin record
        $admin = $adminModel->where('email', $email)->first();

        // 3. Verify password securely
        if ($admin && password_verify($password, $admin['password'])) {
            // Set secure session data
            session()->set([
                'isAdminLoggedIn' => true,
                'admin_id'        => $admin['id'],
                'admin_email'     => $admin['email']
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, Admin.');
        }

        // Generic error message prevents attackers from knowing if the email exists
        return redirect()->back()->with('error', 'Invalid email credentials or password.');
    }

    /**
     * Log the admin out and destroy the session.
     */
    public function logout()
    {
        // Remove only admin-specific session data in case clients are also logged in on the same browser
        session()->remove(['isAdminLoggedIn', 'admin_id', 'admin_email']);
        
        return redirect()->to('/admin/login')->with('success', 'You have been safely logged out.');
    }

    // ==========================================
    // DASHBOARD & FILE MANAGEMENT
    // ==========================================

    /**
     * Display the Admin Dashboard with all uploaded PDFs.
     */
    public function dashboard()
    {
        $pdfModel = new PdfModel();
        
        // Fetch all PDFs, ordering by the most recently uploaded first
        $data['pdfs'] = $pdfModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/dashboard', $data);
    }

    /**
     * Handle the secure uploading of a new PDF file.
     */
    public function uploadPdf()
{
    // 1. Strict Validation Rules for Security (Handles arrays automatically)
    $validationRule = [
        'pdf_file' => [
            'label' => 'PDF Documents',
            'rules' => [
                'uploaded[pdf_file]',
                'mime_in[pdf_file,application/pdf]', // strictly check all files actual MIME type
                'ext_in[pdf_file,pdf]',              // strictly check extensions
                'max_size[pdf_file,10240]',          // Max 10MB per file
            ],
        ],
    ];

    if (!$this->validate($validationRule)) {
        return redirect()->back()->with('error', $this->validator->getErrors());
    }

    // 2. Retrieve the array of uploaded files
    $pdfFiles = $this->request->getFileMultiple('pdf_file');
    
    $uploadedCount = 0;
    $pdfModel = new PdfModel();

    // 3. Process each file in a loop
    foreach ($pdfFiles as $pdfFile) {
        if ($pdfFile->isValid() && !$pdfFile->hasMoved()) {
            
            // Security: Generate randomized names
            $newName      = $pdfFile->getRandomName();
            $originalName = $pdfFile->getClientName();

            // Move to WRITEPATH (Outside the public folder)
            try {
                $pdfFile->move(WRITEPATH . 'uploads', $newName);
                
                // 4. Save metadata to database for this specific file
                $pdfModel->save([
                    'file_name'     => $newName,
                    'original_name' => $originalName
                ]);

                $uploadedCount++;

            } catch (\Exception $e) {
                // If one file fails, continue processing others but log/track it if necessary
                continue;
            }
        }
    }

    // 5. Provide aggregate feedback to the user
    if ($uploadedCount > 0) {
        return redirect()->back()->with('success', "{$uploadedCount} PDF(s) successfully uploaded and secured.");
    }

    return redirect()->back()->with('error', 'No valid files were uploaded.');
}

    /**
     * Handle the deletion of a PDF file (both DB record and physical file).
     * * @param int $id The ID of the PDF to delete
     */
    public function deletePdf($id = null)
    {
        if ($id === null) {
            return redirect()->back()->with('error', 'No file specified for deletion.');
        }

        $pdfModel = new PdfModel();
        $fileInfo = $pdfModel->find($id);

        if ($fileInfo) {
            // 1. Define the physical file path
            $filePath = WRITEPATH . 'uploads/' . $fileInfo['file_name'];

            // 2. Delete the physical file from the server
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // 3. Delete the record from the database
            $pdfModel->delete($id);

            return redirect()->back()->with('success', "File '{$fileInfo['original_name']}' has been permanently deleted.");
        }

        return redirect()->back()->with('error', 'File not found in the database.');
    }
}
<?php

namespace App\Controllers;

use App\Models\PdfModel;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class ClientController extends BaseController
{
    /**
     * Display the list of available PDFs to the logged-in client.
     */
    public function index()
    {
        $pdfModel = new PdfModel();
        
        // Fetch all PDFs, ordering by the most recently uploaded first
        $data['pdfs'] = $pdfModel->orderBy('created_at', 'DESC')->findAll();

        // Load the client view and pass the PDF data to it
        return view('client/pdf_list', $data);
    }

    /**
     * Securely process the download of a specific PDF file.
     * * @param int $id The ID of the PDF in the database
     */
    public function downloadPdf($id = null)
    {
        if ($id === null) {
            return redirect()->back()->with('error', 'Invalid file request.');
        }

        $pdfModel = new PdfModel();
        $fileInfo = $pdfModel->find($id);

        // 1. Check if the file record exists in the database
        if (!$fileInfo) {
            return redirect()->back()->with('error', 'The requested file could not be found in our records.');
        }

        // 2. Construct the secure path to the file in the writable directory
        $filePath = WRITEPATH . 'uploads/' . $fileInfo['file_name'];

        // 3. Check if the physical file actually exists on the server
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'The file exists in the database but is missing from the server.');
        }

        // 4. Force the download 
        // We use setFileName() to ensure the client downloads it with the original readable name, 
        // rather than the randomized secure string it was saved as.
        return $this->response->download($filePath, null)->setFileName($fileInfo['original_name']);
    }
}
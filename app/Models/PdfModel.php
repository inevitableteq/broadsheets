<?php

namespace App\Models;

use CodeIgniter\Model;

class PdfModel extends Model
{
    // 1. Define the database table this model connects to
    protected $table = 'pdfs';

    // 2. Define the primary key
    protected $primaryKey = 'id';

    // 3. Define the return type (array or object). Array is standard and lightweight.
    protected $returnType = 'array';

    // 4. Allowed Fields: CodeIgniter will ONLY let you insert/update these specific columns.
    // This is a crucial security feature to prevent mass-assignment vulnerabilities.
    protected $allowedFields = [
        'file_name', 
        'original_name'
    ];

    // 5. Automatic Timestamps
    // When true, CodeIgniter will automatically fill in 'created_at' and 'updated_at'
    // whenever you run $this->save() or $this->insert()
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Optional: Validation Rules (You can keep validation in the controller as we did, 
    // but you can also put it directly in the model for global enforcement).
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
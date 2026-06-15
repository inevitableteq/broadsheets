<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // 1. The database table this model interacts with
    protected $table = 'admins';

    // 2. The primary key of the table
    protected $primaryKey = 'id';

    // 3. The format the results should be returned in (array is standard)
    protected $returnType = 'array';

    // 4. Allowed Fields: CodeIgniter will strictly ONLY allow inserting/updating these columns.
    // This protects against Mass Assignment Vulnerabilities.
    protected $allowedFields = [
        'email', 
        'password', 
        'created_at'
    ];

    // 5. Timestamp Configuration
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    
    // We set $updatedField to an empty string because our 'admins' table 
    // only has a 'created_at' column, not an 'updated_at' column. 
    // This stops CodeIgniter from throwing a database error when saving.
    protected $updatedField  = '';
}
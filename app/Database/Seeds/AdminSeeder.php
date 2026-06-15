<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'myadmin@example.com',
            'password' => password_hash('@mycode12345', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Simple Query Builder insert
        $this->db->table('admins')->insert($data);
    }
}
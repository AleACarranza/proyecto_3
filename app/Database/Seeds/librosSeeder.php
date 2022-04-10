<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class librosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'jalaxfa',
            'descripcion'    => 'Dios esta aqui, esta aqui'
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('libros')->insert($data);
    }
}
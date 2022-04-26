<?php 
namespace App\Models;

use CodeIgniter\Model;

class Paciente extends Model{
    protected $table      = 'pacientes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields= ['nombre','apellidos', 'genero', 'fechaNacimiento', 'telefono']
}
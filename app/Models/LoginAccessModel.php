<?php namespace App\Models;

    use CodeIgniter\Model;

    class LoginAccessModel extends Model {
        public function obtenerUsuario($usuario) {

            $Usuario = $this->db->table('usuarios');
            $Usuario->where($usuario);

            return $Usuario->get()->getResultArray();

        }

    }



?>
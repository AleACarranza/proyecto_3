<?php namespace App\Models;

    use CodeIgniter\Model;

    class UsuariosCRUDModel extends Model {

        public function getUsuarios() {
            $Nombres = $this->db->query("SELECT * FROM usuarios");
            return $Nombres->getResult();
        }

        public function insertUsuarios($datos) {
            $Nombres = $this->db->table('usuarios');
            $Nombres->insert($datos);

            return $this->db->insertID();
        }

        public function getIdUsuarios($data) {
            $Nombres = $this->db->table('usuarios');
            $Nombres->where($data);

            return $Nombres->get()->getResultArray();
        }

        public function updateUsuario($data, $idUsuario) {
            $Nombres = $this->db->table('usuarios');
            $Nombres->set($data);
            $Nombres->where('id_usuario', $idUsuario);

            return $Nombres->update();
        }

        public function deleteUsuario($idUsuario) {

            $Nombres = $this->db->table('usuarios');
            $Nombres->where($idUsuario);

            return $Nombres->delete();

        }

    }


?>
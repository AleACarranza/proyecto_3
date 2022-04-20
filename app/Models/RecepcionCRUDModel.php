<?php namespace App\Models;

    use CodeIgniter\Model;

    class RecepcionCRUDModel extends Model {

        // *********************** OBTENER (R) INFORMACIÓN RECEPCIÓN ******************************
        public function getRecepcionInfoPrimaria() {
            $RecepcionInfoPrimaria = $this->db->query("SELECT * FROM recepcionista");
            return $RecepcionInfoPrimaria->getResult();
        }

        public function getRecepcionInfoDomicilio() {
            $RecepcionInfoPrimaria = $this->db->query("SELECT * FROM recepcionista");
            return $RecepcionInfoPrimaria->getResult();
        }

        // *********************** INSERTAR (C) INFORMACIÓN RECEPCIÓN ******************************
        public function insertRecepcionDomInfo($datos_recepcion_domicilio) {
            $DatosDom = $this->db->table('recepcionista_domicilio');
            $DatosDom->insert($datos_recepcion_domicilio);

            
            return $this->db->insertID();
        }

        public function insertRecepcionGeneralInfo($datos_recepcion) {
            $DatosDom = $this->db->table('recepcionista');
            $DatosDom->insert($datos_recepcion);

            
            return $this->db->insertID();
    
        }


        public function getRecepcionGeneralInfo($recepcion_id) {
            $RecepcionId = $this->db->table('recepcionista');
            $RecepcionId->where($recepcion_id);

            return $RecepcionId->get()->getResultArray();
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
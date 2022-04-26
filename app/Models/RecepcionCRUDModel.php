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

        public function getRecepcionDomInfo($recepcion_id_dom) {
            $RecepcionId = $this->db->table('recepcionista_domicilio');
            $RecepcionId->where($recepcion_id_dom);

            return $RecepcionId->get()->getResultArray();
        }

        public function updateRecepcionGeneralInfo($data, $id_recepcionista) {
            $RecepcionistaUpdate = $this->db->table('recepcionista');
            $RecepcionistaUpdate->set($data);
            $RecepcionistaUpdate->where('id_recepcionista', $id_recepcionista);

            return $RecepcionistaUpdate->update();
        }

        public function updateRecepcionDomInfo($data, $id_recepcionista_dom) {
            $RecepcionistaUpdateDom = $this->db->table('recepcionista_domicilio');
            $RecepcionistaUpdateDom->set($data);
            $RecepcionistaUpdateDom->where('id_domRecepcionista', $id_recepcionista_dom);

            return $RecepcionistaUpdateDom->update();
        }

        public function eliminarRecepcionistaGeneralInfo($id_recepcionista) {

            $eliminarGInfo = $this->db->table('recepcionista');
            $eliminarGInfo->where($id_recepcionista);

            return $eliminarGInfo->delete();

        }

        public function eliminarRecepcionistaDomInfo($id_recepcionista_dom) {

            $eliminarDInfo = $this->db->table('recepcionista_domicilio');
            $eliminarDInfo->where($id_recepcionista_dom);

            return $eliminarDInfo->delete();

        }

    }


?>
<?php namespace App\Models;

    use CodeIgniter\Model;

    class DoctoresCRUDModel extends Model {

        // *********************** OBTENER (R) INFORMACIÓN RECEPCIÓN ******************************
        public function getDoctoresInfoPrimaria() {
            $DoctoresInfo = $this->db->query("SELECT * FROM doctor");
            return $DoctoresInfo->getResult();
        }

        public function getDoctoresInfoDomicilio() {
            $DoctoresInfoPrimaria = $this->db->query("SELECT * FROM doctor_domicilio");
            return $DoctoresInfoPrimaria->getResult();
        }

        // *********************** INSERTAR (C) INFORMACIÓN RECEPCIÓN ******************************
        public function insertDoctorDomInfo($datos_doctor_domicilio) {
            $DatosDom = $this->db->table('doctor_domicilio');
            $DatosDom->insert($datos_doctor_domicilio);

            
            return $this->db->insertID();
        }

        public function insertDoctorGeneralInfo($datos_doctor) {
            $DatosGeneralInfo = $this->db->table('doctor');
            $DatosGeneralInfo->insert($datos_doctor);
            
            return $this->db->insertID();
    
        }

        public function getDoctorDomInfo($doctor_dom_id) {
            $DoctorDomId = $this->db->table('doctor_domicilio');
            $DoctorDomId->where($doctor_dom_id);

            return $DoctorDomId->get()->getResultArray();
        }

        public function getDoctorInfo($doctor_id) {
            $DoctorId = $this->db->table('doctor');
            $DoctorId->where($doctor_id);

            return $DoctorId->get()->getResultArray();
        }

        public function updateDoctorGeneralInfo($data, $id_doctor) {
            $DoctorUpdateGeneralInfo = $this->db->table('doctor');
            $DoctorUpdateGeneralInfo->set($data);
            $DoctorUpdateGeneralInfo->where('id_doctor', $id_doctor);

            return $DoctorUpdateGeneralInfo->update();
        }

        public function updateDoctorDomInfo($data, $id_doctor_dom) {
            $DoctorUpdateDomInfo = $this->db->table('doctor_domicilio');
            $DoctorUpdateDomInfo->set($data);
            $DoctorUpdateDomInfo->where('id_domDoctor', $id_doctor_dom);

            return $DoctorUpdateDomInfo->update();
        }

        public function eliminarDoctorGeneralInfo($id_doctor) {

            $eliminarGInfo = $this->db->table('doctor');
            $eliminarGInfo->where($id_doctor);

            return $eliminarGInfo->delete();

        }

        public function eliminarDoctorDomInfo($id_doctor_dom) {

            $eliminarDInfo = $this->db->table('doctor_domicilio');
            $eliminarDInfo->where($id_doctor_dom);

            return $eliminarDInfo->delete();

        }

    }


?>
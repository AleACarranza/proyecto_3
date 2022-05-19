<?php namespace App\Models;

    use CodeIgniter\Model;

    class PacientesCRUDModel extends Model {

        // *********************** OBTENER (R) INFORMACIÓN PACIENTES ******************************
        public function getPacientesInfoPrimaria() {
            $PacientesInfo = $this->db->query("SELECT * FROM paciente");
            return $PacientesInfo->getResult();
        }

        public function getDoctoresInfoDomicilio() {
            $DoctoresInfoPrimaria = $this->db->query("SELECT * FROM doctor_domicilio");
            return $DoctoresInfoPrimaria->getResult();
        }

        public function getTratamientoInfoById($id_paciente) {
            $TratamientoInfoById = $this->db->table('tratamiento');
            $TratamientoInfoById->where($id_paciente);

            return $TratamientoInfoById->get()->getResultArray();
        }

        // *********************** INSERTAR (C) INFORMACIÓN PACIENTES ******************************
        public function insertPacienteDomInfo($datos_paciente_domicilio) {
            $DatosDom = $this->db->table('paciente_domicilio');
            $DatosDom->insert($datos_paciente_domicilio);

            
            return $this->db->insertID();
        }

        public function insertPacienteGeneralInfo($datos_paciente) {
            $DatosGeneralInfo = $this->db->table('paciente_datos_generales');
            $DatosGeneralInfo->insert($datos_paciente);
            
            return $this->db->insertID();
    
        }

        public function insertPacientePrimariaInfo($datos_paciente_primaria_info) {
            $DatosPrimariaInfo = $this->db->table('paciente');
            $DatosPrimariaInfo->insert($datos_paciente_primaria_info);
            
            return $this->db->insertID();
    
        }

        public function getPacienteDomInfo($paciente_dom_id) {
            $PacienteDomId = $this->db->table('paciente_domicilio');
            $PacienteDomId->where($paciente_dom_id);

            return $PacienteDomId->get()->getResultArray();
        }

        public function getPacientePrimariaInfo($paciente_id) {
            $PacienteId = $this->db->table('paciente');
            $PacienteId->where($paciente_id);

            return $PacienteId->get()->getResultArray();
        }

        public function getPacienteGeneralInfo($paciente_info_general_id) {
            $PacienteGeneralInfoId = $this->db->table('paciente_datos_generales');
            $PacienteGeneralInfoId->where($paciente_info_general_id);

            return $PacienteGeneralInfoId->get()->getResultArray();
        }

        public function updatePacienteDomInfo($data, $id_paciente_dom) {
            $PacienteUpdateDomInfo = $this->db->table('paciente_domicilio');
            $PacienteUpdateDomInfo->set($data);
            $PacienteUpdateDomInfo->where('id_domPaciente', $id_paciente_dom);

            return $PacienteUpdateDomInfo->update();
        }

        public function updatePacienteGeneralInfo($data, $id_paciente_general_info) {
            $PacienteUpdateGeneralInfo = $this->db->table('paciente_datos_generales');
            $PacienteUpdateGeneralInfo->set($data);
            $PacienteUpdateGeneralInfo->where('id_datosGenerales', $id_paciente_general_info);

            return $PacienteUpdateGeneralInfo->update();
        }

        public function updatePaciente($data, $id_paciente) {
            $PacienteUpdateGeneralInfo = $this->db->table('paciente');
            $PacienteUpdateGeneralInfo->set($data);
            $PacienteUpdateGeneralInfo->where('id_paciente', $id_paciente);

            return $PacienteUpdateGeneralInfo->update();
        }

        public function eliminarPacienteGeneralInfo($id_paciente_general_info) {

            $eliminarGInfo = $this->db->table('paciente_datos_generales');
            $eliminarGInfo->where($id_paciente_general_info);

            return $eliminarGInfo->delete();

        }

        public function eliminarPacienteDomInfo($id_paciente_dom) {

            $eliminarDInfo = $this->db->table('paciente_domicilio');
            $eliminarDInfo->where($id_paciente_dom);

            return $eliminarDInfo->delete();

        }

        public function eliminarPaciente($id_paciente) {

            $eliminarPacienteInfo = $this->db->table('paciente');
            $eliminarPacienteInfo->where($id_paciente);

            return $eliminarPacienteInfo->delete();

        }

    }


?>
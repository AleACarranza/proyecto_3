<?php namespace App\Models;

    use CodeIgniter\Model;

    class TratamientosCRUDModel extends Model {

        // ***************** OBTENER (R) INFORMACIÓN TRATAMIENTO, PACIENTES Y RADIOGRAFIAS **************
        public function getPacientes() {
            $Pacientes = $this->db->query("SELECT * FROM paciente");
            return $Pacientes->getResult();
        }

        public function getTratamientosInfo() {
            $TratamientosData = $this->db->query("SELECT * FROM tratamiento");
            return $TratamientosData->getResult();
        }

        public function getRadiografiaInfo() {
            $RadiografiaData = $this->db->query("SELECT * FROM radiografia");
            return $RadiografiaData->getResult();
        }
        
        public function getPacienteInfoById($paciente_id) {
            $PacienteInfoById = $this->db->table('paciente');
            $PacienteInfoById->where($paciente_id);

            return $PacienteInfoById->get()->getResultArray();
        }

        public function getTratamientoInfoById($tratamiento_id) {
            $TratamientoInfoById = $this->db->table('tratamiento');
            $TratamientoInfoById->where($tratamiento_id);

            return $TratamientoInfoById->get()->getResultArray();
        }

        public function getRadiografiaInfoById($tratamiento_id) {
            $RadiografiaInfoById = $this->db->table('radiografia');
            $RadiografiaInfoById->where($tratamiento_id);

            return $RadiografiaInfoById->get()->getResultArray();
        }

        // **************** INSERTAR (C) INFORMACIÓN TRATAMIENTO Y RADIOGRAFIA *******************
        public function insertTratamientoInfo($datos_tratamiento) {
            $DatosTratamiento = $this->db->table('tratamiento');
            $DatosTratamiento->insert($datos_tratamiento);

            return $this->db->insertID();
        }

        public function insertTratamientoRadiografias($datos_radiografias) {
            $DatosRadiografia = $this->db->table('radiografia');
            $DatosRadiografia->insert($datos_radiografias);

            return $this->db->insertID();
    
        }
        
        public function updateTratamientosInfo($data, $id_tratamiento) {
            $TratamientoUpdate = $this->db->table('tratamiento');
            $TratamientoUpdate->set($data);
            $TratamientoUpdate->where('id_tratamiento', $id_tratamiento);

            return $TratamientoUpdate->update();
        }

        public function eliminarTratamientoInfo($id_tratamiento) {

            $eliminarTratamientoInfo = $this->db->table('tratamiento');
            $eliminarTratamientoInfo->where($id_tratamiento);

            return $eliminarTratamientoInfo->delete();

        }

        public function eliminarTratamientoRadiografiaInfo($id_tratamiento) {

            $eliminarTratamientoRadiografiaInfo = $this->db->table('radiografia');
            $eliminarTratamientoRadiografiaInfo->where($id_tratamiento);

            return $eliminarTratamientoRadiografiaInfo->delete();

        }

    }


?>
<?php namespace App\Models;

    use CodeIgniter\Model;

    class CitasCRUDModel extends Model {

        // *********************** OBTENER (R) INFORMACIÓN CITAS ******************************

        public function getCitasInfo() {
            $CitasInfo = $this->db->query("SELECT * FROM cita");
            return $CitasInfo->getResult();
        }

        public function getCitasInfoById($cita_id) {
            $CitaInfoById = $this->db->table('cita');
            $CitaInfoById->where($cita_id);

            return $CitaInfoById->get()->getResultArray();
        }

        public function getTratamientoById($tratamiento_id) {
            $TratamientoInfoById = $this->db->table('tratamiento');
            $TratamientoInfoById->where($tratamiento_id);

            return $TratamientoInfoById->get()->getResultArray();
        }

        public function getPacientePrimariaInfo($paciente_id) {
            $PacienteId = $this->db->table('paciente');
            $PacienteId->where($paciente_id);

            return $PacienteId->get()->getResultArray();
        }
        
        public function getDoctoresInfoPrimaria() {
            $DoctoresInfo = $this->db->query("SELECT * FROM doctor");
            return $DoctoresInfo->getResult();
        }

        public function getTratamientoInfoById($paciente_id) {
            $TratamientoInfoById = $this->db->table('tratamiento');
            $TratamientoInfoById->where($paciente_id);

            return $TratamientoInfoById->get()->getResultArray();
        }

        public function getDoctorInfoPrimariaById($doctor_id) {
            $DoctorId = $this->db->table('doctor');
            $DoctorId->where($doctor_id);

            return $DoctorId->get()->getResultArray();
        }

        public function insertCitaInfo($datos_citas) {
            $CitaInfo = $this->db->table('cita');
            $CitaInfo->insert($datos_citas);
            
            return $this->db->insertID();
    
        }

        public function updateCitaInfoById($datos_cita, $id_cita) {
            $CitaUpdateInfo = $this->db->table('cita');
            $CitaUpdateInfo->set($datos_cita);
            $CitaUpdateInfo->where('id_cita', $id_cita);

            return $CitaUpdateInfo->update();
    
        }

        public function eliminarCita($id_cita) {

            $eliminarCita = $this->db->table('cita');
            $eliminarCita->where($id_cita);

            return $eliminarCita->delete();

        }

    }
?>
<?php

namespace App\Controllers;

use App\Models\CitasCRUDModel;

class CitasController extends BaseController
{
    public function index(){

        $getCitasInfo = new CitasCRUDModel();
        $datos = $getCitasInfo->getCitasInfo();

        $mensaje = session('mensaje');

        $data = [
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];

        return view('citas_view/citas', $data);
    }

    public function view_crearCita($id_paciente){

        $dataId = [
            "id_paciente" => $id_paciente
        ];

        $PacientesInfo = new CitasCRUDModel();
        $datosPaciente = $PacientesInfo->getPacientePrimariaInfo($dataId);

        $getDoctoresInfoGeneral = new CitasCRUDModel();
        $datosDoctor = $getDoctoresInfoGeneral->getDoctoresInfoPrimaria();

        $getPacientesInfoTratamientos = new CitasCRUDModel();
        $datosTratamiento = $getPacientesInfoTratamientos->getTratamientoInfoById($dataId);

        $data = [
            "datosDoctor"      => $datosDoctor,
            "datosTratamiento" => $datosTratamiento,
            "datosPaciente"    => $datosPaciente
        ];
 
        if($datosTratamiento) {
            return view('citas_view/crear_cita', $data);
        } else {
            return view('citas_view/no_tratamiento');
        }

    }

    public function crearCita() {
     
        $data = [
            "id_doctor" => $_POST['doctor_id']
        ];

        $nombreDoctor = new CitasCRUDModel();
        $nombreDoctorById = $nombreDoctor->getDoctorInfoPrimariaById($data);

        $nombreCompleto = $nombreDoctorById['0']['nombre'] . ' ' . $nombreDoctorById['0']['apellidos'];


        $datos_cita = [

           "fecha_cita"      => $_POST['fecha_cita'],
           "hora"            => $_POST['hora_cita'],
           "observaciones"   => $_POST['observaciones'],
           "estado"          => $_POST['estado'],
           "firma"           => $_POST['firma'],
           "id_tratamiento2" => $_POST['tratamiento_id'],
           "id_doctor"       => $_POST['doctor_id'],
           "nombre_doctor"   => $nombreCompleto,
           "nombre_paciente" => $_POST['paciente_nombre'],

        ];
       
       $DatosCita = new CitasCRUDModel();
       $id_cita = $DatosCita->insertCitaInfo($datos_cita);


       if($id_cita > 0) {
           return redirect()->to(base_url().'/citas_view')->with('mensaje', '1');
       } else {
           return redirect()->to(base_url().'/citas_view')->with('mensaje', '0');
       }

   }

   public function view_mas_informacionCita($cita_id) {

        $id_cita = [

            "id_cita" => $cita_id

        ];

        $DatosCitaById = new CitasCRUDModel();
        $responseCitaInfoById = $DatosCitaById->getCitasInfoById($id_cita);

        $idTratamiento = [
            "id_tratamiento" => $responseCitaInfoById['0']['id_tratamiento2']
        ];

        $TratamientoInfo = new CitasCRUDModel();
        $responseTratamientoInfoById = $TratamientoInfo->getTratamientoById($idTratamiento);

        $datosCita = [
            "datos"             => $responseCitaInfoById,
            "datos_tratamiento" => $responseTratamientoInfoById
        ];

        return view('citas_view/mas_informacion_cita', $datosCita);


   }

   public function view_editarCita($cita_id) {

        $id_cita = [

            "id_cita" => $cita_id

        ];

        $getDoctoresInfoGeneral = new CitasCRUDModel();
        $datosDoctor = $getDoctoresInfoGeneral->getDoctoresInfoPrimaria();

        $DatosCitaById = new CitasCRUDModel();
        $responseCitaInfoById = $DatosCitaById->getCitasInfoById($id_cita);

        $idTratamiento = [
            "id_tratamiento" => $responseCitaInfoById['0']['id_tratamiento2']
        ];

        $TratamientoInfo = new CitasCRUDModel();
        $responseTratamientoInfoById = $TratamientoInfo->getTratamientoById($idTratamiento);

        $datosCita = [
            "datos"             => $responseCitaInfoById,
            "datos_tratamiento" => $responseTratamientoInfoById,
            "datosDoctor"       => $datosDoctor
        ];

        return view('citas_view/editar_cita', $datosCita);


    }

    public function update_citaInfo() {

        $data = [
            "id_doctor" => $_POST['doctor_id']
        ];

        $id_cita = $_POST['cita_id'];
        $nombreDoctor = new CitasCRUDModel();
        $nombreDoctorById = $nombreDoctor->getDoctorInfoPrimariaById($data);

        $nombreCompleto = $nombreDoctorById['0']['nombre'] . ' ' . $nombreDoctorById['0']['apellidos'];


        $datos_cita = [

           "fecha_cita"      => $_POST['fecha_cita'],
           "hora"            => $_POST['hora_cita'],
           "observaciones"   => $_POST['observaciones'],
           "estado"          => $_POST['estado'],
           "firma"           => $_POST['firma'],
           "id_tratamiento2" => $_POST['tratamiento_id'],
           "id_doctor"       => $_POST['doctor_id'],
           "nombre_doctor"   => $nombreCompleto,
           "nombre_paciente" => $_POST['paciente_nombre'],

        ];
       
       $DatosCita = new CitasCRUDModel();
       $id_cita = $DatosCita->updateCitaInfoById($datos_cita, $id_cita);


       if($id_cita > 0) {
           return redirect()->to(base_url().'/citas_view')->with('mensaje', '1');
       } else {
           return redirect()->to(base_url().'/citas_view')->with('mensaje', '0');
       }

    }

    public function eliminarCita($id_cita) {

        $data = [
            "id_cita" => $id_cita
        ];
        
        $EliminarCita = new CitasCRUDModel();
        $respuesta = $EliminarCita->eliminarCita($data);

        if($respuesta) {
            return redirect()->to(base_url().'/citas_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/citas_view')->with('mensaje', '5');
        }

    }

}

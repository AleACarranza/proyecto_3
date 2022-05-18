<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use App\Models\TratamientosCRUDModel;

class TratamientosController extends BaseController
{
    public function index(){

        $getTratamientosInfo = new TratamientosCRUDModel();
        $datos = $getTratamientosInfo->getTratamientosInfo();

        // Al momento de redireccionar con al crear un nuevo usuario, nos trae el mensaje
        $mensaje = session('mensaje');

        $data = [
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];

        if (session('rol') != 'Admin' && session('rol') != 'Doctor') {
            return redirect()->to(base_url('/citas_view'));
        }
        
        return view('tratamientos_view/tratamientos', $data);
    }


    public function view_crearTratamiento() {
        
        $Pacientes = new TratamientosCRUDModel();
        $datos = $Pacientes->getPacientes();

        $data = [
            "datos" => $datos
        ];

        return view('tratamientos_view/crear_tratamiento', $data);
    }

    

    public function view_editarTratamiento($id_tratamiento) {

        $data = [
            "id_tratamiento" => $id_tratamiento
        ];

        $TratamientoInfo = new TratamientosCRUDModel();
        $TratamientoInfoById = $TratamientoInfo->getTratamientoInfoById($data);

        $RadiografiaInfo = new TratamientosCRUDModel();
        $RadiografiaInfoById = $RadiografiaInfo->getRadiografiaInfoById($data);

        $datosTratamiento = [
            "datos" => $TratamientoInfoById,
            "datosR" => $RadiografiaInfoById
        ];

        return view('tratamientos_view/editar_tratamiento', $datosTratamiento);

    }

    public function actualizarTratamiento() {

        $data = [
            "id_paciente" => $_POST['paciente']
        ];

        $nombrePaciente = new TratamientosCRUDModel();
        $nombrePacienteById = $nombrePaciente->getPacienteInfoById($data);

        $nombreCompleto = $nombrePacienteById['0']['nombre'] . ' ' . $nombrePacienteById['0']['apellidos'];

        $datos_tratamiento = [

            "fecha_inicio" => $_POST['fecha_inicio'],
            "fecha_fin"    => $_POST['fecha_fin'],
            "tratamiento"  => $_POST['tratamiento'],
            "costo"        => $_POST['costo'],
            "notas"        => $_POST['notas'],
            "estado"       => $_POST['estado'],
            "id_paciente"  => $_POST['paciente'],
            "nombre_paciente"  => $nombreCompleto,

         ];

         $id_tratamiento = $_POST['id_tratamiento'];

         $TratamientoInfo = new TratamientosCRUDModel();
         $respuesta_tratamiento = $TratamientoInfo->updateTratamientosInfo($datos_tratamiento, $id_tratamiento);

         if($respuesta_tratamiento) {
             return redirect()->to(base_url().'/tratamientos_view')->with('mensaje', '2');
         } else {
             return redirect()->to(base_url().'/tratamientos_view ')->with('mensaje', '3');
         }

    }

    public function view_mas_informacionTratamiento($id_tratamiento) {

        $data = [
            "id_tratamiento" => $id_tratamiento
        ];

        $TratamientoInfo = new TratamientosCRUDModel();
        $TratamientoInfoById = $TratamientoInfo->getTratamientoInfoById($data);

        $RadiografiaInfo = new TratamientosCRUDModel();
        $RadiografiaInfoById = $RadiografiaInfo->getRadiografiaInfoById($data);

        $datosTratamiento = [
            "datos" => $TratamientoInfoById,
            "datosR" => $RadiografiaInfoById
        ];

        return view('tratamientos_view/mas_informacion_tratamiento', $datosTratamiento);

    }

    public function crearTratamiento() {

        $data = [
            "id_paciente" => $_POST['paciente']
        ];

        $nombrePaciente = new TratamientosCRUDModel();
        $nombrePacienteById = $nombrePaciente->getPacienteInfoById($data);

        $nombreCompleto = $nombrePacienteById['0']['nombre'] . ' ' . $nombrePacienteById['0']['apellidos'];
        
        $datos_tratamiento = [

            "fecha_inicio" => $_POST['fecha_inicio'],
            "fecha_fin"    => $_POST['fecha_fin'],
            "tratamiento"  => $_POST['tratamiento'],
            "costo"        => $_POST['costo'],
            "notas"        => $_POST['notas'],
            "estado"       => $_POST['estado'],
            "id_paciente"  => $_POST['paciente'],
            "nombre_paciente"  => $nombreCompleto,

         ];

         $datosTratamientoSend = new TratamientosCRUDModel();
         $id_tratamiento = $datosTratamientoSend->insertTratamientoInfo($datos_tratamiento);

         $file = $this->request->getFile('radiografia');

         $newName = $file->getRandomName();
         $file->move('./public/uploads', $newName);
         $name = $file->getName();

         $myTime = new Time('now');
         $myTime->toLocalizedString('yyyy-MMM-d');

         $datos_radiografia = [

            "url_radiografia" => $name,
            "fecha"           => $myTime,
            "id_tratamiento"  => $id_tratamiento

         ];

         $datosRadiografiaSend = new TratamientosCRUDModel();
         $id_radiografia = $datosRadiografiaSend->insertTratamientoRadiografias($datos_radiografia);

         if($id_radiografia > 0) {
            return redirect()->to(base_url().'/tratamientos_view')->with('mensaje', '1');
         } else {
            return redirect()->to(base_url().'/tratamientos_view')->with('mensaje', '0');
         }

    }

    public function eliminarTratamiento($id_tratamiento) {

        $data = [
            "id_tratamiento" => $id_tratamiento
        ];
        
        $TratamientoRadiografiaInfo = new TratamientosCRUDModel();
        $TratamientoRadiografiaInfoResponse = $TratamientoRadiografiaInfo->eliminarTratamientoRadiografiaInfo($data);

        $TratamientoInfo = new TratamientosCRUDModel();
        $TratamientoInfoResponse = $TratamientoInfo->eliminarTratamientoInfo($data);


        if($TratamientoInfoResponse && $TratamientoRadiografiaInfoResponse) {
            return redirect()->to(base_url().'/tratamientos_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/tratamientos_view')->with('mensaje', '5');
        }

    }

}

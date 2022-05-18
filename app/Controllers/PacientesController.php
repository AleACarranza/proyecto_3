<?php

namespace App\Controllers;

use App\Models\DoctoresCRUDModel;

use App\Models\PacientesCRUDModel;

class PacientesController extends BaseController
{
    public function index(){

        $getPacientesInfoPrimaria = new PacientesCRUDModel();
        $datos = $getPacientesInfoPrimaria->getPacientesInfoPrimaria();

        $mensaje = session('mensaje');

        $data = [
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];
        
        return view('pacientes_view/pacientes', $data);
    }


    public function view_crearPaciente() {
        return view('pacientes_view/crear_paciente');
    }

    public function crear_registroPaciente() {
     

        $datos_paciente_domicilio = [

           "calle" => $_POST['calle'],
           "numExt" => $_POST['numext'],
           "numInt" => $_POST['numint'],
           "colonia" => $_POST['colonia'],
           "cp" => $_POST['cp'],
           "cuidad" => $_POST['cuidad'],
           "estado" => $_POST['estadoRepublica'],

        ];

        $DatosPacienteDom = new PacientesCRUDModel();
        $id_paciente_domicilio = $DatosPacienteDom->insertPacienteDomInfo($datos_paciente_domicilio);

        $datos_generales_paciente = [

           "telefono2"         => $_POST['telefono2'],
           "medio"             => $_POST['medio'],
           "fecha_ingreso"     => $_POST['fecha_ingreso'],
           "fecha_vencimiento" => $_POST['fecha_vencimiento'],
           "correo"            => $_POST['correo'],
           "peso"              => $_POST['peso'],
           "talla"             => $_POST['talla'],
           "presion"           => $_POST['presion'],
           "glucosa"           => $_POST['glucosa'],

        ];

        $DatosPacienteGeneralInfo = new PacientesCRUDModel();
        $id_paciente_info_general = $DatosPacienteGeneralInfo->insertPacienteGeneralInfo($datos_generales_paciente);

        $datos_paciente_info_primaria = [

           "nombre"             => $_POST['nombre'],
           "apellidos"          => $_POST['apellidos'],
           "genero"             => $_POST['genero'],
           "fecha_nacimiento"   => $_POST['fecha_nacimiento'],
           "telefono"           => $_POST['telefono'],
           "id_domPaciente"     => $id_paciente_domicilio,
           "id_datosGenerales"  => $id_paciente_info_general

       ];
       
       $DatosPacienteInfoPrimaria = new PacientesCRUDModel();
       $id_paciente = $DatosPacienteInfoPrimaria->insertPacientePrimariaInfo($datos_paciente_info_primaria);


       if($id_paciente > 0) {
           return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '1');
       } else {
           return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '0');
       }

   }

   public function view_mas_informacionPaciente($id_paciente) {

        $data = [
            "id_paciente" => $id_paciente
        ];

        $PacientesInfo = new PacientesCRUDModel();
        $InfoData = $PacientesInfo->getPacientePrimariaInfo($data);

        $dataDom = [
            "id_domPaciente" => $InfoData['0']['id_domPaciente']
        ];

        $PacienteDomInfo = new PacientesCRUDModel();
        $InfoDataDom = $PacienteDomInfo->getPacienteDomInfo($dataDom);

        $dataGeneral = [
            "id_datosGenerales" => $InfoData['0']['id_datosGenerales']
        ];

        $PacienteGeneralInfo = new PacientesCRUDModel();
        $InfoDataGeneral = $PacienteGeneralInfo->getPacienteGeneralInfo($dataGeneral);

        $datosPaciente = [
            "datos"           => $InfoData,
            "datos_dom"       => $InfoDataDom,
            "datos_generales" => $InfoDataGeneral
        ];

        return view('pacientes_view/mas_informacion_paciente', $datosPaciente);
    }

    public function view_actualizarPaciente($id_paciente) {

        $data = [
            "id_paciente" => $id_paciente
        ];

        $PacientesInfo = new PacientesCRUDModel();
        $InfoData = $PacientesInfo->getPacientePrimariaInfo($data);

        $dataDom = [
            "id_domPaciente" => $InfoData['0']['id_domPaciente']
        ];

        $PacienteDomInfo = new PacientesCRUDModel();
        $InfoDataDom = $PacienteDomInfo->getPacienteDomInfo($dataDom);

        $dataGeneral = [
            "id_datosGenerales" => $InfoData['0']['id_datosGenerales']
        ];

        $PacienteGeneralInfo = new PacientesCRUDModel();
        $InfoDataGeneral = $PacienteGeneralInfo->getPacienteGeneralInfo($dataGeneral);

        $datosPaciente = [
            "datos"           => $InfoData,
            "datos_dom"       => $InfoDataDom,
            "datos_generales" => $InfoDataGeneral
        ];

        return view('pacientes_view/editar_paciente', $datosPaciente);
        

    }


    public function update_pacienteInfo() {

        $id_paciente       = $_POST['id_paciente'];
        $id_datosGenerales = $_POST['id_paciente_info_general'];
        $id_domPaciente    = $_POST['id_paciente_dom'];

        $datos_paciente_domicilio = [

            "calle" => $_POST['calle'],
            "numExt" => $_POST['numext'],
            "numInt" => $_POST['numint'],
            "colonia" => $_POST['colonia'],
            "cp" => $_POST['cp'],
            "cuidad" => $_POST['cuidad'],
            "estado" => $_POST['estadoRepublica'],
 
         ];
 
         $datos_generales_paciente = [
 
            "telefono2"         => $_POST['telefono2'],
            "medio"             => $_POST['medio'],
            "fecha_ingreso"     => $_POST['fecha_ingreso'],
            "fecha_vencimiento" => $_POST['fecha_vencimiento'],
            "correo"            => $_POST['correo'],
            "peso"              => $_POST['peso'],
            "talla"             => $_POST['talla'],
            "presion"           => $_POST['presion'],
            "glucosa"           => $_POST['glucosa'],
 
         ];
 
         $datos_paciente_info_primaria = [
 
            "nombre"             => $_POST['nombre'],
            "apellidos"          => $_POST['apellidos'],
            "genero"             => $_POST['genero'],
            "fecha_nacimiento"   => $_POST['fecha_nacimiento'],
            "telefono"           => $_POST['telefono'],
 
        ];

        $UpdateDatosPacienteDom = new PacientesCRUDModel();
        $respuesta_paciente_domicilio = $UpdateDatosPacienteDom->updatePacienteDomInfo($datos_paciente_domicilio, $id_domPaciente );

        $UpdateDatosPacienteGeneralInfo = new PacientesCRUDModel();
        $respuesta_paciente_info_general = $UpdateDatosPacienteGeneralInfo->updatePacienteGeneralInfo($datos_generales_paciente, $id_datosGenerales);
        
        $DatosPacienteInfoPrimaria = new PacientesCRUDModel();
        $respuesta_paciente = $DatosPacienteInfoPrimaria->updatePaciente($datos_paciente_info_primaria, $id_paciente);
 
 
        if($respuesta_paciente && $respuesta_paciente_domicilio && $respuesta_paciente_info_general) {
            return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '3');
        }
    }


    public function eliminarPaciente($id_paciente) {

        $data = [
            "id_paciente" => $id_paciente
        ];

        $PacientesInfo = new PacientesCRUDModel();
        $InfoData = $PacientesInfo->getPacientePrimariaInfo($data);

        $dataDom = [
            "id_domPaciente" => $InfoData['0']['id_domPaciente']
        ];

        $dataGeneral = [
            "id_datosGenerales" => $InfoData['0']['id_datosGenerales']
        ];

        $PacientesInfo = new PacientesCRUDModel();
        $respuesta_paciente = $PacientesInfo->eliminarPaciente($data);

        $PacienteGeneralInfo = new PacientesCRUDModel();
        $respuesta_paciente_gi = $PacienteGeneralInfo->eliminarPacienteGeneralInfo($dataGeneral);

        $PacienteDomInfo = new PacientesCRUDModel();
        $respuesta_paciente_dom = $PacienteDomInfo->eliminarPacienteDomInfo($dataDom);


        if($respuesta_paciente && $respuesta_paciente_dom && $respuesta_paciente_gi) {
            return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/pacientes_view')->with('mensaje', '5');
        }

    }
}

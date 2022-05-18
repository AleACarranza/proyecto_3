<?php

namespace App\Controllers;

use App\Models\DoctoresCRUDModel;

class DoctoresController extends BaseController {
    
    public function index(){

        $getDoctoresInfoGeneral = new DoctoresCRUDModel();
        $datos = $getDoctoresInfoGeneral->getDoctoresInfoPrimaria();

        $mensaje = session('mensaje');

        $data = [
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];


        if (session('rol') != 'Admin' && session('rol') != 'Doctores') {
            return redirect()->to(base_url('/citas_view'));
        }
        
        return view('doctores_view/doctores', $data);
    }

    public function view_crearDoctor() {
        return view('doctores_view/crear_doctor');
    }

    public function crear_registroDoctor() {
     

        $datos_doctor_domicilio = [

           "calle" => $_POST['calle'],
           "numExt" => $_POST['numext'],
           "numInt" => $_POST['numint'],
           "colonia" => $_POST['colonia'],
           "cp" => $_POST['cp'],
           "cuidad" => $_POST['cuidad'],
           "estado" => $_POST['estadoRepublica'],

        ];

        $DatosDoctorDom = new DoctoresCRUDModel();
        $id_doctor_domicilio = $DatosDoctorDom->insertDoctorDomInfo($datos_doctor_domicilio);

        $datos_doctor = [

           "nombre"           => $_POST['nombre'],
           "apellidos"        => $_POST['apellidos'],
           "genero"           => $_POST['genero'],
           "fecha_nacimiento" => $_POST['fecha_nacimiento'],
           "telefono"         => $_POST['telefono'],
           "correo"           => $_POST['correo'],
           "estado"           => $_POST['estado'],
           "id_domDoctor"     => $id_doctor_domicilio

       ];
       
       $DatosDoctorGeneral = new DoctoresCRUDModel();
       $id_doctor = $DatosDoctorGeneral->insertDoctorGeneralInfo($datos_doctor);


       if($id_doctor > 0) {
           return redirect()->to(base_url().'/doctores_view')->with('mensaje', '1');
       } else {
           return redirect()->to(base_url().'/doctores_view')->with('mensaje', '0');
       }

   }

   public function view_mas_informacionDoctor($id_doctor) {

        $data = [
            "id_doctor" => $id_doctor
        ];

        $DoctorInfo = new DoctoresCRUDModel();
        $InfoData = $DoctorInfo->getDoctorInfo($data);

        $dataDom = [
            "id_domDoctor" => $InfoData['0']['id_domDoctor']
        ];

        $DoctorDomInfo = new DoctoresCRUDModel();
        $InfoDataDom = $DoctorDomInfo->getDoctorDomInfo($dataDom);

        $datosDoctor = [
            "datos" => $InfoData,
            "datos_dom" => $InfoDataDom
        ];

        return view('doctores_view/mas_informacion_doctor', $datosDoctor);
    }

    public function view_actualizarDoctor($id_doctor) {

        $data = [
            "id_doctor" => $id_doctor
        ];

        $DoctorInfo = new DoctoresCRUDModel();
        $InfoData = $DoctorInfo->getDoctorInfo($data);

        $dataDom = [
            "id_domDoctor" => $InfoData['0']['id_domDoctor']
        ];

        $DoctorDomInfo = new DoctoresCRUDModel();
        $InfoDataDom = $DoctorDomInfo->getDoctorDomInfo($dataDom);

        $datosDoctor = [
            "datos" => $InfoData,
            "datos_dom" => $InfoDataDom
        ];

        return view('/doctores_view/editar_doctor', $datosDoctor);
        

    }


    public function update_doctorInfo() {

        $datos_doctor = [

            "nombre"              => $_POST['nombre'],
            "apellidos"           => $_POST['apellidos'],
            "genero"              => $_POST['genero'],
            "fecha_nacimiento"    => $_POST['fecha_nacimiento'],
            "correo"              => $_POST['correo'],
            "telefono"            => $_POST['telefono'],
            "estado"              => $_POST['estado'],
            "id_domDoctor"        => $_POST['idDoctorDom']

        ];
        
        $id_doctor    = $_POST['idDoctor'];
        $id_domDoctor = $_POST['idDoctorDom'];


        $datos_doctor_domicilio = [

            "calle"   => $_POST['calle'],
            "numExt"  => $_POST['numext'],
            "numInt"  => $_POST['numint'],
            "colonia" => $_POST['colonia'],
            "cp"      => $_POST['cp'],
            "cuidad"  => $_POST['cuidad'],
            "estado"  => $_POST['estadoRepublica'],

         ];

         $updateDatosDoctorDomicilio = new DoctoresCRUDModel();
         $respuesta_doctor_domicilio = $updateDatosDoctorDomicilio->updateDoctorDomInfo($datos_doctor_domicilio, $id_domDoctor);

         $updateDatosDoctorGeneral = new DoctoresCRUDModel();
         $respuesta_doctor_general = $updateDatosDoctorGeneral->updateDoctorGeneralInfo($datos_doctor, $id_doctor);

         
        
        if($respuesta_doctor_general && $respuesta_doctor_domicilio) {
            return redirect()->to(base_url().'/doctores_view')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url().'/doctores_view')->with('mensaje', '3');
        }

    }


    public function eliminarDoctor($id_doctor) {

        $data = [
            "id_doctor" => $id_doctor
        ];
        
        $DoctorInfo = new DoctoresCRUDModel();
        $InfoData = $DoctorInfo->getDoctorInfo($data);
        
        $dataDom = [
            "id_domDoctor" => $InfoData['0']['id_domDoctor']
        ];
        
        $EliminarDoctorGeneralInfo = new DoctoresCRUDModel();
        $respuesta = $EliminarDoctorGeneralInfo->eliminarDoctorGeneralInfo($data);

        $EliminarDoctorDomInfo = new DoctoresCRUDModel();
        $respuesta = $EliminarDoctorDomInfo->eliminarDoctorDomInfo($dataDom);

        if($respuesta) {
            return redirect()->to(base_url().'/doctores_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/doctores_view')->with('mensaje', '5');
        }

    }


}

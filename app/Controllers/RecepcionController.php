<?php

namespace App\Controllers;

use App\Models\UsuariosCRUDModel;

use App\Models\RecepcionCRUDModel;

class RecepcionController extends BaseController
{
    public function index() {

        $getRecepcionInfoGeneral = new RecepcionCRUDModel();
        $datos = $getRecepcionInfoGeneral->getRecepcionInfoPrimaria();
        
        // Al momento de redireccionar con al crear un nuevo usuario, nos trae el mensaje
        $mensaje = session('mensaje');

        $data = [
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];
        
        if (session('rol') != 'Admin') {
            return redirect()->to(base_url('/citas_view'));
        }

        return view('recepcion_view/recepcion', $data);
    }

    public function view_mas_informacion_recepcion($id_recepcionista) {

        $data = [
            "id_recepcionista" => $id_recepcionista
        ];

        

        $InfoRecepcionInfo = new RecepcionCRUDModel();
        $InfoData = $InfoRecepcionInfo->getRecepcionGeneralInfo($data);

        $dataDom = [
            "id_domRecepcionista" => $InfoData['0']['id_domRecepcionista']
        ];

        $InfoRecepcionDomInfo = new RecepcionCRUDModel();
        $InfoDataDom = $InfoRecepcionDomInfo->getRecepcionDomInfo($dataDom);

        $datosRecepcion = [
            "datos" => $InfoData,
            "datos_dom" => $InfoDataDom
        ];

        return view('recepcion_view/mas_informacion_recepcion', $datosRecepcion);
    }

    public function view_crear_recepcion() {
        return view('recepcion_view/crear_recepcion');
    }

    public function crearNuevoRegistroRecepcion() {
     

         $datos_recepcion_domicilio = [

            "calle" => $_POST['calle'],
            "numExt" => $_POST['numext'],
            "numInt" => $_POST['numint'],
            "colonia" => $_POST['colonia'],
            "cp" => $_POST['cp'],
            "cuidad" => $_POST['cuidad'],
            "estado" => $_POST['estadoRepublica'],

         ];

         $datosRecepcionDomicilio = new RecepcionCRUDModel();
         $id_recepcion_domicilio = $datosRecepcionDomicilio->insertRecepcionDomInfo($datos_recepcion_domicilio);

         $datos_recepcion = [

            "nombre" => $_POST['nombre'],
            "apellidos" => $_POST['apellidos'],
            "genero" => $_POST['genero'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "correo" => $_POST['correo'],
            "telefono" => $_POST['telefono'],
            "estado" => $_POST['estado'],
            "id_domRecepcionista" => $id_recepcion_domicilio

        ];
        
        $datosRecepcionGeneral = new RecepcionCRUDModel();
        $id_recepcion = $datosRecepcionGeneral->insertRecepcionGeneralInfo($datos_recepcion);


        if($id_recepcion > 0) {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '0');
        }

    }


    public function getRecepcionInfo($id_recepcionista) {

        $data = [
            "id_recepcionista" => $id_recepcionista
        ];

        

        $InfoRecepcionInfo = new RecepcionCRUDModel();
        $InfoData = $InfoRecepcionInfo->getRecepcionGeneralInfo($data);

        $dataDom = [
            "id_domRecepcionista" => $InfoData['0']['id_domRecepcionista']
        ];

        $InfoRecepcionDomInfo = new RecepcionCRUDModel();
        $InfoDataDom = $InfoRecepcionDomInfo->getRecepcionDomInfo($dataDom);

        $datosRecepcion = [
            "datos" => $InfoData,
            "datos_dom" => $InfoDataDom
        ];

        return view('/recepcion_view/editar_recepcion', $datosRecepcion);
        

    }

    public function updateRecepcionInfo() {

        $datos_recepcion = [

            "nombre"              => $_POST['nombre'],
            "apellidos"           => $_POST['apellidos'],
            "genero"              => $_POST['genero'],
            "fecha_nacimiento"    => $_POST['fecha_nacimiento'],
            "correo"              => $_POST['correo'],
            "telefono"            => $_POST['telefono'],
            "estado"              => $_POST['estado'],
            "id_domRecepcionista" => $_POST['idRecepcionistaDom']

        ];
        
        $id_Recepcionista    = $_POST['idRecepcionista'];
        $id_domRecepcionista = $_POST['idRecepcionistaDom'];


        $datos_recepcion_domicilio = [

            "calle"   => $_POST['calle'],
            "numExt"  => $_POST['numext'],
            "numInt"  => $_POST['numint'],
            "colonia" => $_POST['colonia'],
            "cp"      => $_POST['cp'],
            "cuidad"  => $_POST['cuidad'],
            "estado"  => $_POST['estadoRepublica'],

         ];

         $updateDatosRecepcionDomicilio = new RecepcionCRUDModel();
         $respuesta_recepcion_domicilio = $updateDatosRecepcionDomicilio->updateRecepcionDomInfo($datos_recepcion_domicilio, $id_domRecepcionista);

         $updateDatosRecepcionGeneral = new RecepcionCRUDModel();
         $respuesta_recepcion_general = $updateDatosRecepcionGeneral->updateRecepcionGeneralInfo($datos_recepcion, $id_Recepcionista);

         
        
        if($respuesta_recepcion_general && $respuesta_recepcion_domicilio) {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '3');
        }

    }

    

    public function eliminarRecepcionista($id_recepcionista) {

        $data = [
            "id_recepcionista" => $id_recepcionista
        ];
        
        $InfoRecepcionInfo = new RecepcionCRUDModel();
        $InfoData = $InfoRecepcionInfo->getRecepcionGeneralInfo($data);
        
        $dataDom = [
            "id_domRecepcionista" => $InfoData['0']['id_domRecepcionista']
        ];
        
        $EliminarRecepcionistaGeneralInfo = new RecepcionCRUDModel();
        $respuesta = $EliminarRecepcionistaGeneralInfo->eliminarRecepcionistaGeneralInfo($data);

        $EliminarRecepcionistaDomInfo = new RecepcionCRUDModel();
        $respuesta = $EliminarRecepcionistaDomInfo->eliminarRecepcionistaDomInfo($dataDom);

        if($respuesta) {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/recepcion_view')->with('mensaje', '5');
        }

    }

}

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

        $datos = [
            "datos" => $InfoData
        ];

        return view('/recepcion_view/editar_recepcion', $datos);
        

    }

    public function updateRecepcionInfo() {

        //$password_hash = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        //
        //$datos = [
        //    "usuario"    => $_POST['usuario'],             
        //    "rol"        => $_POST['rol'],      
        //    "contrasena" => $password_hash,       
        //    "estado"     => $_POST['estado']       
        //];
        //
        //$idUsuario = $_POST['idUsuario'];
        //$Crud = new UsuariosCRUDModel();
        //
        //$respuesta = $Crud->updateUsuario($datos, $idUsuario);
        //
        //if($respuesta) {
        //    return redirect()->to(base_url().'/admin_view')->with('mensaje', '2');
        //} else {
        //    return redirect()->to(base_url().'/admin_view')->with('mensaje', '3');
        //}

    }

    

    public function eliminarUsuario($idUsuario) {

        $Crud = new UsuariosCRUDModel();
        $data = ["id_usuario" => $idUsuario];

        $respuesta = $Crud->deleteUsuario($data);

        if($respuesta) {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '5');
        }

    }

}

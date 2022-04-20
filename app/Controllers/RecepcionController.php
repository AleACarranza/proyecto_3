<?php

namespace App\Controllers;

use App\Models\UsuariosCRUDModel;

class RecepcionController extends BaseController
{
    public function index() {

        //$Crud = new UsuariosCRUDModel();
        //$datos = $Crud->getUsuarios();
        //
        //// Al momento de redireccionar con al crear un nuevo usuario, nos trae el mensaje
        //$mensaje = session('mensaje');
//
        //$data = [
        //    'titulo'  => "Admin View - Usuarios y Roles",
        //    'datos'   => $datos,
        //    'mensaje' => $mensaje
        //];
//
        //if (session('rol') != 'Admin') {
        //    return redirect()->to(base_url('/citas_view'));
        //}

        return view('recepcion_view/recepcion');
    }

    public function crearNuevoUsuario() {

        $password_hash = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        $datos = [
            "usuario"    => $_POST['usuario'],             
            "rol"        => $_POST['rol'],      
            "contrasena" => $password_hash,       
            "estado"     => $_POST['estado']       
        ];

        $Crud = new UsuariosCRUDModel();
        $respuesta = $Crud->insertUsuarios($datos);

        if($respuesta > 0) {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '0');
        }

    }

    public function actualizarUsuario() {

        $password_hash = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        $datos = [
            "usuario"    => $_POST['usuario'],             
            "rol"        => $_POST['rol'],      
            "contrasena" => $password_hash,       
            "estado"     => $_POST['estado']       
        ];

        $idUsuario = $_POST['idUsuario'];
        $Crud = new UsuariosCRUDModel();

        $respuesta = $Crud->updateUsuario($datos, $idUsuario);

        if($respuesta) {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url().'/admin_view')->with('mensaje', '3');
        }

    }

    public function obtenerIdUsuario($idUsuario) {

        $data = [
            "id_usuario" => $idUsuario
        ];

        $Crud = new UsuariosCRUDModel();
        $respuesta = $Crud->getIdUsuarios($data);
        $datos = [
            'titulo' => "Usuarios y Roles - Actualizar",
            "datos" => $respuesta
        ];

        return view('/admin_view/actualizar_usuario', $datos);
        

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

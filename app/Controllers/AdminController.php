<?php

namespace App\Controllers;

use App\Models\UsuariosCRUDModel;

class AdminController extends BaseController
{
    public function index() {

        $Crud = new UsuariosCRUDModel();
        $datos = $Crud->getUsuarios();
        // Al momento de redireccionar con al crear un nuevo usuario, nos trae el mensaje
        $mensaje = session('mensaje');

        $data = [
            'titulo'  => "Admin View - Usuarios y Roles",
            'datos'   => $datos,
            'mensaje' => $mensaje
        ];

        echo view('admin_view/header', $data);
        echo view('admin_view/menu');
        echo view('admin_view/index');
        echo view('admin_view/footer');
    }

    public function crearNuevoUsuario() {

        $datos = [
            "usuario"    => $_POST['usuario'],             
            "rol"        => $_POST['rol'],      
            "contrasena" => $_POST['contrasena'],       
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

        $datos = [
            "usuario"    => $_POST['usuario'],             
            "rol"        => $_POST['rol'],      
            "contrasena" => $_POST['contrasena'],       
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

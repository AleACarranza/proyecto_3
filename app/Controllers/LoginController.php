<?php

namespace App\Controllers;

    use App\Models\LoginAccessModel;

class LoginController extends BaseController
{
    public function index(){

        $mensaje = session('mensaje');

        $data = [
            'mensaje' => $mensaje
        ];
        return view('login', $data);
    }


    public function login() {

        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $data = [
            "usuario" => $usuario
        ];

        $Usuario = new LoginAccessModel();

        $datosUsuario = $Usuario->obtenerUsuario($data);

        if(count($datosUsuario) > 0 &&
            password_verify($password, $datosUsuario[0]['contrasena'])) {

            $datos = [
                "usuario" => $datosUsuario[0]['usuario'],
                "rol"     => $datosUsuario[0]['rol']
            ];
            $session = session();
            $session->set($datos);

            $base = '/citas_view';

            if (session('rol') == "Admin") {
                $base = '/admin_view';
            } 

            return redirect()->to(base_url($base))->with('mensaje', 'success');

        } else {
            
            return redirect()->to(base_url().'/')->with('mensaje', '0');
        }

    }

    public function cerrar_sesion() {

        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));

    }
}

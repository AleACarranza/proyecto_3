<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $datos = [
            "titulo" => "Inicio de CodeIgniter 4"
        ];
        return view('login', $datos);
    }

    public function formulario() {
        return view('formulario');
    }

    public function enviarPost() {
        $valor1 = $_POST["valor1"];
        $valor2 = $_POST["valor2"];

        echo $valor1 + $valor2;
    }
}

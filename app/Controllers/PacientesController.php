<?php

namespace App\Controllers;

class PacientesController extends BaseController
{
    public function index(){

        if (session('rol') != 'Admin' || session('rol') != 'Doctor') {
            return view('citas_view/citas');
        }

        return view('pacientes_view/pacientes');
    }
}

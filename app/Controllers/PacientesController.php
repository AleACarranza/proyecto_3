<?php

namespace App\Controllers;

class PacientesController extends BaseController
{
    public function index(){

        if (session('rol') != 'Admin' && session('rol') != 'Doctor') {
            return redirect()->to(base_url('/citas_view'));
        }
        
        return view('pacientes_view/pacientes');
    }
}

<?php

namespace App\Controllers;

class DoctoresController extends BaseController
{
    public function index(){

        if (session('rol') != 'Admin') {
            return redirect()->to(base_url('/citas_view'));
        }
        
        return view('doctores_view/doctores');
    }
}

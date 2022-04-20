<?php

namespace App\Controllers;

class CitasController extends BaseController
{
    public function index(){
        return view('citas_view/citas');
    }
}

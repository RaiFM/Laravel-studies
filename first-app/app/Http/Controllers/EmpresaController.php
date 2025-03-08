<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        return "index";
    }
    
    public function time($time = 0){
        return "time: " . $time;
    }
}

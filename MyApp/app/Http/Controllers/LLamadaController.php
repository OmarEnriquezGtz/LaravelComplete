<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LLamadaController extends Controller
{
    public function index(){
        return 'Index';
    }
    public function edit($id){
        return 'El id a modificar es ' . $id;
    }
    public function show($nombre,$edad){
       // return view('llamada')-> with('nombre',$nombre)-> with('edad',$edad);
         return view('llamada',compact('nombre','edad'));   
    }
    public function blades(){
        $alumnos = ['Omar','Fredy','Gerardo','Mario','Bri','Jose'];
        return view('complementos', compact('alumnos'));
    }
    
}

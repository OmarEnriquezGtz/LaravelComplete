<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    
    public function suma($n1,$n2){
        $resultado=$n1+$n2;
        $operacion="+";
        $operacion2="SUMA";
        return view('resultado',compact('resultado','operacion','operacion2','n1','n2'));   
    }
    public function resta($n1,$n2){
        $resultado=$n1-$n2;
        $operacion="-";
        $operacion2="RESTA";
        return view('resultado',compact('resultado','operacion','operacion2','n1','n2'));   
    }
    public function multiplicacion($n1,$n2){
        $resultado=$n1*$n2;
        $operacion="*";
        $operacion2="MULTIPLICACIÓN";
        return view('resultado',compact('resultado','operacion','operacion2','n1','n2')); 
    }
    public function division($n1,$n2){
        $resultado=$n1/$n2;
        $operacion="/";
        $operacion2="DIVISIÓN";
        return view('resultado',compact('resultado','operacion','operacion2','n1','n2')); 
    }
    
}

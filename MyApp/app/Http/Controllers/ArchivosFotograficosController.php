<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

//use  App\Models\ArchivosFotograficos;
//use Illuminate\Http\RedirectResponse;


class ArchivosFotograficosController extends Controller
{
    //

    public function index(){

        return View::make('archivosFotograficos.index');
    }
    public function store(Request $request){

        if($request->file('file'))
        {
         $file= $request->file('file');
         $nombreArchivoOriginal= $file->getClientOriginalName();
         $size=$file->getSize();
            if ($size>10000000)
            {   
                return "Error: Archivo demasiado grande";
            }else {

                $file->move('images',$nombreArchivoOriginal);
                $input['path']=$nombreArchivoOriginal;
            }
        }
         
         
    }
}

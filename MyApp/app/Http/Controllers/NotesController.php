<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Notes;

class NotesController extends Controller
{
    

  public function insertar(){
        DB::insert('insert into notes(titulo, description, contenido) 
        values (?, ?, ?)',['Nuevo nota', 'Ejemplo de nota', 'Este es el contenido de una nota nueva']);
    }

    public function leer(){

        $resultados = DB::select('select * from notes where id = ?', [1]);
        //return var_dump($resultados);
        foreach($resultados as $result){
            echo $result->titulo;
            echo '<br>';
            echo $result->description;
            echo '<br>';
            echo $result->contenido;
        }


    

}


public function actualizar(){
    $update =  DB::update('update notes set titulo = "Actualizado" where id = ?',
     [1]);
    return $update;
 }

 public function eliminar(){
     $eliminar = DB::delete('delete from notes where id = ?', [1]);
     return $eliminar;
 }


 public function leerTodos(){

   return $notas = Notes::all(); 

 }

    
}


@extends('layouts.app')

@section('content')

<h2> Archivos Fotogrficos</h2>

{{ Form::open(array('method'=>'POST','action'=>'App\Http\Controllers\ArchivosFotograficosController@store','files'=>true))}}

<div class="form-group">
    {{Form::label('title','Nombre')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
   {{Form::file('file',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {!!Form::submit('Guardar Foto',['class'=>'form-control'])!!}
</div>
    
{{ Form::close()}}


@endsection('content')
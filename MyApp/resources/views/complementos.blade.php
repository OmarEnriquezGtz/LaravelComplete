
@extends('layouts.app')

@section('content')

<h1> Blade</h1>

@if(count($alumnos)>0)
<ol>
     @foreach($alumnos as $alumno)
        <li>{{$alumno}}</li>
     @endforeach
</ol>
@else
<p>El arreglo está vacío</p>
@endif
@stop

@extends('layouts.app')

@section('content')


<h1> Employees</h1>

@include('employees.lista')

@push('js')
@endpush

@stop

@extends('layouts.app')
@section('content')
@foreach ($employee as $employees)
<form action="/updateEmployees" method="POST">
    @method('put')
    @csrf
    <div class="mb-3 col-md-3">
        <input type="hidden" class="form-control" id="employeeid" value='{{$employees->EmployeeID}}' name="employeeid">
       
      </div>
    <div class="mb-3 col-md-3">
      <label for="exampleInputEmail1" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastName" value='{{$employees->LastName}}' name="lastName">
     
    </div>
    <div class="mb-3 col-md-3">
      <label for="exampleInputPassword1" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstname" value='{{$employees->FirstName}}' name="firstname">
    </div>
    <div class="mb-3 col-md-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control" id="title"  value='{{$employees->Title}}' name="title">
       
      </div>
      
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @endforeach

  @endsection
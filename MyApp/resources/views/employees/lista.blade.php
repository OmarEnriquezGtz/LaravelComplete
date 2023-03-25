@if (count($employees)>0)
  

    <table class="table" id="exemple">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Title</th>
       <th scope="col">Acciones</th>
       
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
    <tr>
      <th scope="row">{{$employee->EmployeeID}}</th>
      <td>{{$employee->LastName}}</td>
      <td>{{$employee->FirstName}}</td>
      <td>{{$employee->Title}}</td>
      <td>
        <a href="/editEmployees/{{$employee->EmployeeID}}"> 
          <button class="btn btn-warning">Actualizar</button>
        </a> 
        <a href="/deleteEmployees/{{$employee->EmployeeID}}"> 
         <button class="btn btn-danger">Eliminar</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>



@else
    <h2>No se encontraron productos disponibles</h2>
@endif

<script>
    $(document).ready(function(){
        $('#exemple').DataTable();
    });
</script>
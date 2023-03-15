@if (count($products)>0)
  

    <table class="table" id="exemple">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Acciones</th>
       
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->ProductID}}</th>
      <td>{{$product->ProductName}}</td>
      <td>{{$product->CategoryName}}</td>
      <td>{{$product->UnitPrice}}</td>
      <td>{{$product->UnitsInStock}}</td>
      <td>
        <a href="/editProduct/{{$product->ProductID}}"> 
          <button class="btn btn-warning">Actualizar</button>
        </a> 
        <button class="btn btn-danger">Eliminar</button>
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
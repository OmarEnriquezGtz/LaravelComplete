
@extends('layouts.app')
@section('content')
@foreach ($product as $product)
<form action="/updateProduct" method="POST">
    @method('put')
    @csrf
   
    <div class="mb-3 col-md-3">
        <input type="hidden" class="form-control" id="productName" value='{{$product->ProductID}}' name="id">
       
      </div>
    <div class="mb-3 col-md-3">
      <label  class="form-label">Product Name</label>
      <input type="text" class="form-control" id="productName" value='{{$product->ProductName}}' name="productName">
     
    </div>
    <div class="mb-3 col-md-3">
      <label class="form-label">Category</label>
      <div class="input-group">
							<input type="tex" class="form-control"  id="categoryName"  value='{{$product->CategoryName}}' name="categoryName"  disabled>
							<span class="input-group-btn">
							<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#categorysearch" > Buscar</button>
							</span>
				</div>
    </div>
    <div class="mb-3 col-md-3" style="display:none">
        <label for="exampleInputPassword1" class="form-label">Category ID</label>
        <input type="number" class="form-control" id="categoryID" min="1" step="1" max="1000" value='{{$product->CategoryID}}' name="categoryID" >
      </div>
 
    <div class="mb-3 col-md-3">
        <label for="exampleInputEmail1" class="form-label">Unit Price</label>
        <input type="number" class="form-control" id="price" min="0.1"  step=0.01 value='{{$product->UnitPrice}}' name="unitPrice">
       
      </div>
      <div class="mb-3 col-md-3">
        <label for="exampleInputPassword1" class="form-label">Units InStock</label>
        <input type="number" class="form-control" id="units" min="1" step="1" max="1000" value='{{$product->UnitsInStock}}' name="unitsInStock">
      </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
   
  </form>
  @endforeach

<!-- modal--> 
  <div class="modal" id="categorysearch" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Double click on the category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <table class="table" id="exemple">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
       
    </tr>
  </thead>
  <tbody>
    @foreach($category as $categories)
    <tr>
      <th scope="row"><a onclick="traecategory('{{$categories->CategoryID}}','{{$categories->CategoryName}}')" data-bs-dismiss="modal">{{$categories->CategoryID}}</a>
      </th>
      <td> <a onclick="traecategory('{{$categories->CategoryID}}','{{$categories->CategoryName}}')" data-bs-dismiss="modal">{{$categories->CategoryName}}</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

function traecategory(idcat,cat){
	$("#categoryName").val(cat);
  $("#categoryID").val(idcat);
}

</script>
  @endsection

 
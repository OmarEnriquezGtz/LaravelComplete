<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use  App\Models\Product;
use  App\Models\Categories;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use App\Models\Employees;



class ProductsController extends Controller
{
    public function index()
    {
        
         //$products = Product::all();
         $products = Product::select('ProductID','ProductName','CategoryName','UnitPrice','UnitsInStock')
            ->join('Categories','Products.CategoryID','=','Categories.CategoryID')
            ->where('Discontinued',0)
            ->get();

         return View::make('products.index')->with('products',$products);
     }
     public function listaEmployees()
     {
        $employees = Employees::select('EmployeeID','LastName','FirstName','Title')
       ->where('Discharged',0) 
        ->get();
        return View::make('employees.index')->with('employees',$employees); 
     }
     public function edit($id){
      $product = Product::select('ProductID', 'ProductName', 'Products.CategoryID','Categories.CategoryName', 'UnitPrice', 'UnitsInStock' )
  ->join('Categories', 'Products.CategoryID', '=', 'Categories.CategoryID')
  ->where('ProductID', $id)
  ->get();
   $category = Categories::select('CategoryID','CategoryName')
  ->get();

   return View('products.edit',compact('product','category'));

      }
public function update(Request $request){
       
   $request->all();

  $id = $request->input('id'); 
  $productName = $request->input('productName'); 
  $categoryName = $request->input('categoryName'); 

  $categoryID = Categories::select('CategoryID')
  ->where('CategoryName',$categoryName)
  ->get();
  $categoryID2 = $request->input('categoryID'); 
  

  $unitPrice = $request->input('unitPrice'); 
  $unitsInStock = $request->input('unitsInStock'); 



 
  $validate =  $request->validate([
      'productName' => 'required', 
      'categoryID'=> 'required', 
      'unitPrice' => 'required|min:0.01|max:10000',
      'unitsInStock' => 'required'

  ]);



 $update = Product::where('ProductID', $id)
         //->get();
       ->update([ 'ProductName' => $productName,
          'CategoryID' => $categoryID2, 
          'UnitPrice' => $unitPrice, 
          'UnitsInStock' => $unitsInStock
       ]);

 return redirect('/indexProducts');       
  
}
     public function delete(){
      return "";
     }

     public function editEmployees($id){
       $employee = Employees::select('EmployeeID', 'LastName', 'FirstName', 'Title')
  ->where('EmployeeID', $id)
  ->get();

   return View('employees.edit',compact('employee'));

      }
      public function updateEmployees(Request $request){
       
         $request->all();
      
        $id = $request->input('employeeid'); 
        $lastName = $request->input('lastName'); 
        $firstname = $request->input('firstname'); 
        $title = $request->input('title'); 
      
        $validate =  $request->validate([
            'lastName' => 'required', 
            'firstname'=> 'required', 
            'title' => 'required'
      
        ]);
       $update = Employees::where('EmployeeID', $id)
               //->get();
             ->update([ 'LastName' => $lastName,
               // 'CategoryID' => $categoryID->CategoryID, 
                'FirstName' => $firstname, 
                'Title' => $title
             ]);
      
       return redirect('/Employees');       
        
      }
      public function eliminaProducto($id){
         $elimina=Product::where('ProductID', $id)-> first();
         if($elimina){
          $softDelete= Product::where('ProductID', $id)
            ->update(['Discontinued'=>1]);
         }
         else{
            return "Error";
         }

         if ($softDelete>=1)
         { 
            return redirect('/indexProducts');    
         }
      }
      public function eliminaEmpleado($id){
         $elimina=Employees::where('EmployeeID', $id)-> first();
         if($elimina){
          $softDelete= Employees::where('EmployeeID', $id)
            ->update(['Discharged'=>1]);
         }
         else{
            return "Error";
         }

         if ($softDelete>=1)
         { 
            return redirect('/Employees');    
         }
      }



}

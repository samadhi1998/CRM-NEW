@extends('layouts.app')
@section('title','Product Information')
@section('content')


@foreach ($products as $product)
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
    <div class="col-md">
        <div class="card" >
            <div class="card-body">


       <h6 class="card-title"><strong>Product Details :</strong></h6>
    <p><strong>
          Product ID : {{ $product->ProductID }}<br>
          Created Date : {{ $product->Created_at }}<br><br> 
    </strong></p>

    <h6 class="card-title"><strong>Admin  Information:</strong></h6>
    <p><strong> 
    <br>
        Admin ID : {{ $product->AdminID }} <br>
        Admin Name :{{ $product->name }}<br>
        Contact Number : {{ $product->MobileNo}} <br>
        Admin Email  : {{ $product->email}} <br>
       
       
    </strong></p>  
    <br>

<h6 class="card-title"><strong>Product Information :</strong></h6>
<br>
    <table class="table table-bordered">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Brand</th>
                <th scope="col"> Product Description</th>
                <th scope="col">Product Warranty </th>
                <th scope="col"> Product Price</th> 
                <th scope="col"> Product Quantity</th> 
                <th scope="col"> Product Status </th> 
                <th scope="col"> Stock_Defective </th> 
            </tr>
        
            <tr>                         
                <td>{{ $product->Name}} </td>
                <td>{{ $product->Brand}} </td>   
                <td>{{  $product-> Description}} </td>                       
                <td>{{$product->Warranty }} </td>
                <td>{{ $product->Price}}</td>     
                <td>{{$product->Qty }} </td>
                <td>{{ $product->Status }}</td>     
                <td>{{ $product->stock_defective}}</td> 

            </tr>
            
   </table> 
</div>
</div>
</div>
</div>
</div>


@endforeach 

@endsection
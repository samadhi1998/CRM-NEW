@extends('layouts.app')
@section('title','Search Products')
@section('content')

<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554"> Searching Product Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">
</br>
<font-size="2" face="Verdana" >
<table class="table table-striped" borders="4" >
  <thead >
    <tr style="height:70px;width:100px">
      <th scope="col">Admin ID</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Brand</th>
      <th scope="col" >Product View</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
         @foreach($products as $product)
    <tr>                                                
      <th scope="row">{{$product['AdminID']}}</th>
      <td>{{$product['ProductID']}}</td>
      <td>{{$product['Name']}}</td>
      <td>{{$product['Brand']}}</td>
      <td> <img src="{{asset('uploads/product/'.$product->image)  }}" width="100px;" height="100px;" alt="Product-Image">  </td>
      <td>{{$product['Price']}}</td>
      <td>{{$product['Qty']}}</td>
      <td>{{$product['Description']}}</td>
      <td>{{$product['Status']}}</td>
</tr>
@endforeach
</tbody>
</table>
</font-size>
</br>
<div style="text-align: right;font-size: 15px;">
<span>{{$products->links()}}</span>
</div>
</br>

@endsection
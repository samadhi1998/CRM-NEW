@extends('layouts.app')
@section('title','View Products')
@section('content')
<div class="container">
<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Product Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">
<form action="/Search_Products" method="GET" role="search">
{{ csrf_field() }}
<div class="input-group">
<input type="text" class="form-control" name="query" id="query"
 placeholder="Search Products"> <span class="input-group-btn">
<button type="submit" class="btn btn-default">
 <span class="glyphicon glyphicon-search"></span>
  </button>
  </span>
  </div>
</form>
</br>
</br>
<font-size="2" face="Verdana" >
<table class="table table-striped" borders="4" >
  <thead >
    <tr style="height:70px;width:100px">
      <th scope="col">Admin ID</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
         @foreach($products as $product)
    <tr>                                                
      <th scope="row">{{$product['AdminID']}}</th>
      <td>{{$product['ProductID']}}</td>
      <td>{{$product['Name']}}</td>
      <td>{{$product['Brand']}}</td>
      <td>{{$product['Price']}}</td>
      <td>{{$product['Qty']}}</td>
      <td>{{$product['Description']}}</td>
      <td>{{$product['Status']}}</td>
      <td>
     <tab></tab>
          <a href="/updateProduct/{{$product['ProductID']}}"  style="margin:2px"><button> Update</button></a><tab></tab>
          
          <!--{{"/UpdateProducts/".$product['ProductID']}}-->
      </td>

</tr>
@endforeach
</tbody>
</table>
<font-size>
</br>
<div style="text-align: right;font-size: 15px;">
<span>{{$products->links()}}</span>
</div>
</br>
</div>

@endsection
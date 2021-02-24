@extends('layouts.app')

@section('content')
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>View Product Details</title>
        <style>

 button {
  background-color: white;
  color: #233554;
  border-radius: 40px;
  margin: auto;
  display: block;
 float: right;
}

::placeholder { 
  color: #233554 !important;
  opacity: 1; 
  font-weight: Bold;
  font-size:15px;
}


tr:nth-child(odd) {
background-color: lightskyblue;
text-align: center;
font-size:14px;
}
tr:nth-child(even) {
background-color:#d5e4f2;
text-align: center;
font-size:14px;
}
th { background-color:#233554;
      color:white;
      text-align: center;
      font-size:15px;
}

        </style>  
    </head>
<body>

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
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
@endsection
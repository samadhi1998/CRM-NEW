@extends('layouts.app')
@section('title','View Products')
@section('content')

    <h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
    <h2 style="text-align: center; color:#233554">Product Details</h2>
    <hr style="background-color:#233554; height: 5px">

    <br>
  
    <form action="/Search_Products" method="GET" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control" name="query" id="query" placeholder="Search Products"> <span class="input-group-btn">
        <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
      </div>
    </form>
  

    </br>
    </br>

  <table>
    <tr >
      <th >Admin ID</th>
      <th >Product ID</th>
      <th >Product Name</th>
      <th >Brand</th>
      <th >Price</th>
      <th >Quantity</th>
      <th >Description</th>
      <th >Status</th>
      <th >Action</th>
    </tr>
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
          <a href= {{"/UpdateProducts/".$product['ProductID']}} style="margin:2px"><button> Update</button></a><tab></tab>                                
          <!-- "/updateProduct/{{$product['ProductID']}}"  -->
      </td>
    </tr>
        @endforeach
  </table>

</br>

<div style="text-align: right;font-size: 15px;">
<span>{{$products->links()}}</span>
</div>
</br>


@endsection
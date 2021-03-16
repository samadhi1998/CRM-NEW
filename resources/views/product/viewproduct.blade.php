@extends('layouts.app')
@section('title','View Products')
@section('header','Product Details')
@section('content')
<div class="pull-left">
    <a class="btn btn-primary" href="/addproduct">Add new product <span data-feather="plus"></a>
</div>
<br>
<br>
<div class="container " style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Product Details') }}</div> -->

                <div class="card-body">

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
          <a href= "/UpdateProducts/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
          <a href= "" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a> 
          <!-- "/updateProduct/{{$product['ProductID']}}"  -->
      </td>
    </tr>
        @endforeach
  </table>
  </div></div></div></div></div></div>
</br>

<div style="text-align: right;font-size: 15px;">
<span>{{$products->links()}}</span>
</div>
</br>



@endsection
@extends('layouts.app')
@section('title','View Products')
@section('header','Product Details')
@section('content')

<div class="pull-left">
@if(Auth::user()->can('add-product', App\Models\product::class))
    <a class="btn btn-primary" href="/addproduct">Add new product <span data-feather="plus"></a>
    @endif
</div>

<div class="pull-right" style="text-align: right;">
    @if(Auth::user()->can('Stock-In-product', App\Models\product::class))
    <a class="btn btn-primary" href="/InStockProducts"> Available</a>
    @endif

    @if(Auth::user()->can('Stock-out-product', App\Models\product::class))
    <a class="btn btn-primary"  href="/StockoutProducts">Re Order</a>
    @endif

    @if(Auth::user()->can('Not-Available-product', App\Models\product::class))
     <a class="btn btn-primary" href="/notAvailableProducts">Not Available</a>
     @endif

</div>
  <br>
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
        <input type="text" class="form-control" name="query" id="query" placeholder="Search stock Products"> <span class="input-group-btn">
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
      <th >Product View</th>
      <th >Brand</th>
      <th >Price</th>
      <th >Quantity</th>
      <th >Warranty</th>
      <th >Description</th>
      <th >Status</th>
      <th >Action</th>
    </tr>
         @foreach($products as $product)
    <tr>                                                
      <th scope="row">{{$product['AdminID']}}</th>
      <td>{{$product['ProductID']}}</td>
      <td>{{$product['Name']}}</td>
      <td> <img src="{{asset('uploads/product/'.$product->image)  }}"
       class="img-circle" width="100px;" height="100px;" alt="Product-Image">  </td>
      <td>{{$product['Brand']}}</td>
      <td>{{$product['Price']}}</td>
      <td>{{$product['Qty']}}</td>
      <td>{{$product['Warranty']}}</td>
      <td>{{$product['Description']}}</td>
      <td>{{$product['Status']}}</td>
      <td>
          @if(Auth::user()->can('edit-product', App\Models\product::class))
          <a href= "/UpdateProducts/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
          @endif
          @if(Auth::user()->can('delete-product', App\Models\product::class))
          <a href= "/Delete_Products/{{$product['ProductID']}}" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a> 
          @endif
      </td>
    </tr>
        @endforeach
  </table>
  <br>
  <br>

  {{$products->links()}}


    <div class="pull-right" style="text-align: right;color:blue">
      <a href="{{ URL::previous() }}">Go Back</a>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>
</br>
@endsection
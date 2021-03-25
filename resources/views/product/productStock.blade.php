@extends('layouts.app')
@section('title','View Products Stock')
@section('header','Product Stock Details')
@section('content')

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
        <input type="text" class="form-control" name="query" id="query" placeholder="Search  Stock Products Details"> <span class="input-group-btn">
        <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span> 
      </div>
    </form>
  
    </br>
    </br>
    </br>
    </br>
  <table>
    <tr >
      <th >Product ID</th>
      <th >Product Name</th>
      <th >Product View</th>
      <th >Brand</th>
      <th >Price</th>
      <th >Quantity</th>
      <th >Warranty</th>
    
    </tr>
    @foreach( $data as $product)
    <tr>                                                
      <td>{{$product->ProductID}}</td>
      <td>{{$product->Name}}</td>
      <td> <img src="{{asset('uploads/product/'.$product->image)  }}"
       class="img-circle" width="100px;" height="100px;" alt="Product-Image">  </td>
      <td>{{$product->Brand}}</td>
      <td>{{$product->Price}}</td>
      <td>{{$product->Qty}}</td>
      <td>{{$product->Warranty}}</td>
    </tr>
        @endforeach
  </table>
  <br>
  <br>
  {{$data->links()}}
  <div class="pull-right" style="text-align: right;color:blue">
  <a href="{{ URL::previous() }}">Go Back</a>
  </div>
  </div></div></div></div></div></div>
@endsection
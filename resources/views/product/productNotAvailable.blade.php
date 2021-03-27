@extends('layouts.app')
@section('title','Not Available Products')
@section('header','  Not Available Products Details')
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
      <th >Product Name</th>
      <th >Product View</th>
      <th >Brand</th>
      <th >Price</th>
      <th >Warranty</th>
      <th >Action</th>
    </tr>
    @foreach( $data as $product)
    <tr>                                                
      <td>{{$product->Name}}</td>
      <td> <img src="{{asset('uploads/product/'.$product->image)  }}"
       class="img-circle" width="100px;" height="100px;" alt="Product-Image">  </td>
      <td>{{$product->Brand}}</td>
      <td>{{$product->Price}}</td>
      <td>{{$product->Warranty}}</td>
      <td>  <a href= "/UpdateProducts/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a> 
    </td>
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
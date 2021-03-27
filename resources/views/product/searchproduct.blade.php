@extends('layouts.app')
@section('title','Search Products')
@section('content')
<div class="container" style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Search Products') }}</div>

                <div class="card-body">

<table>
  <thead >
    <tr >
      <th >Admin ID</th>
      <th >Product ID</th>
      <th >Product Name</th>
      <th >Brand</th>
      <th >Product View</th>
      <th >Price</th>
      <th >Quantity</th>
      <th >Description</th>
      <th >Status</th>
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
</br>
</br>

{{$products->links()}}

<div class="pull-right" style="text-align: right;color:blue">
  <a href="{{ URL::previous() }}">Go Back</a>
  </div>
</br>
</div></div></div></div></div></div>
@endsection
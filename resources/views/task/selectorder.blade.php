@extends('layouts.app')
@section('title','Select Order')
@section('header','Select Order')
@section('content')


<div class="container " style="background :none !important ">
<div class="row justify-content-center">
<div class="col-md">
<div class="card">
<div class="card-body">

<br>
  </br>

  <table>
    <tr >
      <th >Order ID</th>
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
@extends('layouts.app')
@section('title','View Products')
@section('header','Product Details')
@section('content')

<div class="pull-left">
    <a class="btn btn-primary" href="/addproduct">Add new product <span data-feather="plus"></a>
</div>

<div class="pull-right" style="text-align: right;">
    <a class="btn btn-primary" href="/InStockProducts"> In Stock</a>
    <a class="btn btn-primary"  href="/StockoutProducts">Re Order</a>
     <a class="btn btn-primary" href="/notAvailableProducts">Out of Stock</a>
</div>
  <br>
  <br>
  <br>

<div class="container " style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <br>
          <form action="/Search_Products" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
              <input type="text" class="form-control" name="query" id="query" placeholder="Search stock Products">
                <span class="input-group-btn">
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
              <th >@sortablelink('Name')</th>
              <th >Product View</th>
              <th >Brand</th>
              <th >@sortablelink('Price')</th>
              <th >@sortablelink('Qty')</th>
              <th>Stock_Defective</th>
              <th >Status</th>
              <th >Action</th>
            </tr>
            @foreach($products as $product)
            <tr>                                                
              <td>{{$product['Name']}}</td>
              <td> <img src="{{asset('uploads/product/'.$product->image)  }}"
              class="img-circle" width="100px;" height="100px;" alt="Product-Image">  </td>
              <td>{{$product['Brand']}}</td>
              <td>{{$product['Price']}}</td>
              <td>{{$product['Qty']}}</td>
              <td>{{$product->stock_defective}}</td>
              <td>{{$product['Status']}}</td>
              <td>
              @if(Auth::user()->can('view-product-information', App\Models\product::class))
                <a href="/ProductInformation/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
              @endif
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
          {!! $products->appends(\Request::except('page'))->render() !!}
          <div class="pull-right" style="text-align: right;color:blue">
            <a href="{{ URL::previous() }}">Go Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
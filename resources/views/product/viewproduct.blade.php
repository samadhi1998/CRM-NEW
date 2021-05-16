@extends('layouts.app')
@section('title','View Products')
@section('header','Product Details')
@section('content')

@if(Auth::user()->can('add-product', App\Models\product::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/addproduct">Add new product <span data-feather="plus"></a>
</div>
@endif

@if(Auth::user()->roles->name == 'Super-Admin')
<div class="pull-left">
    <a class="btn btn-primary" href="/productrestore"> Restore Deleted Products</a>
</div>
@endif

<div class="pull-right" style="text-align: right;">
    @if(Auth::user()->can('Stock-In-product', App\Models\product::class))
    <a class="btn btn-primary" href="/InStockProducts"> In Stock</a>
    @endif
    @if(Auth::user()->can('Stock-out-product', App\Models\product::class))
    <a class="btn btn-primary"  href="/ReOrderProducts">Re Order</a>
    @endif
    @if(Auth::user()->can('Not-Available-product', App\Models\product::class))
    <a class="btn btn-primary" href="/notAvailableProducts">Out of Stock</a>
    @endif
</div>
  <br>
  <br>
  <br>
  @if (Session::has('error'))
       <div class="alert alert-danger" role="alert">
           {{Session::get('error')}}
       </div>
  @endif
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif

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
          <div class="table-responsive">
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
              <td style="text-align: left">{{$product['Name']}}</td>
              <td> <img src="{{asset('uploads/product/'.$product->image)  }}"
              class="img-circle" width="100px;" height="100px;" alt="Product-Image">  </td>

              <td>{{$product['Brand']}}</td>
              <td>Rs.{{ number_format($product->Price, 2) }}</td>
              <td>{{$product['Qty']}}</td>
              <td>{{$product->stock_defective}}</td>
              <td @if($product['Status']=='Reorder level') style="color: red;" @endif
               @if($product['Status']=='Out of Stock') style="color: red;" @endif >{{$product['Status']}}</td>

              <td>
              @if(Auth::user()->can('view-product-information', App\Models\product::class))
                <a href="/ProductInformation/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
              @endif
              @if(Auth::user()->can('edit-product', App\Models\product::class))
                <a href= "/UpdateProducts/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
              @endif
              @if(Auth::user()->can('delete-product', App\Models\product::class))
                <a href="/Delete_Products/{{$product['ProductID']}}" style="margin:2px" class="text-my-own-color" onclick="return confirm('Are you sure you want to delete this item?');">
                  <span data-feather="trash-2"></span>
                  </a>
              @endif
              </td>
            </tr>
                @endforeach
          </table>
          </div>
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
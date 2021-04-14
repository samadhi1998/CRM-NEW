@extends('layouts.app')
@section('title','View Products')
@section('header','Product Details')
@section('content')

@if(Auth::user()->can('add-product', App\Models\product::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/addproduct">Add new product <span data-feather="plus"></a>
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
                <a href="" style="margin:2px" class="text-my-own-color" data-toggle="modal" data-target="#exampleModal2">
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

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Delete Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" style="color:#233554">
                You are going to delete the records of  Product ID  {{$product['ProductID']}} - {{$product['Name']}}. Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="/Delete_Products/{{$product['ProductID']}}"><button type="submit" form="myformproduct" class="btn btn-primary">Continue</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
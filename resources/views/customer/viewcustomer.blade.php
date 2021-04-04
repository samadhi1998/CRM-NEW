@extends('layouts.app')
@section('title','View Customer')
@section('header','Customer Details')
@section('content')

@if(Auth::user()->can('add-customer', App\Models\customer::class))
  <div class="pull-left" style="text-align: right;color:blue">
    <a href="/addCustomer" class="btn btn-primary"> Add Customer</a>
  </div>
@endif
<br>
<br>
<br>
<div class="container " style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <form action="/Search_Customers" method="GET" role="search">
            {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="query" id="query" placeholder="Search Customers"> 
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
            <thead>
              <tr>
                <th>@sortablelink('CustomerID')</th>
                <th>@sortablelink('Name')</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>@sortablelink('Email')</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($customers->count())
              @foreach($customers as $customer)
              <tr>                                                
                <th >{{$customer['CustomerID']}}</th>
                <td>{{$customer['Name']}}</td>
                <td>{{$customer['Address']}}</td>
                <td>{{$customer['MobileNo']}}</td>
                <td>{{$customer['Email']}}</td>
                <td>
                @if(Auth::user()->can('edit-customer', App\Models\customer::class))
                    <a href="/editCustomer/{{$customer['CustomerID']}}" style="margin:2px" class="text-my-own-color"><i data-feather="edit"></i></a>
                @endif
                @if(Auth::user()->can('delete-customer', App\Models\customer::class))
                    <a href="/deleteCustomer/{{$customer['CustomerID']}}" style="margin:10px" class="text-my-own-color"><i data-feather= "trash-2"></i></a>
                @endif
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          <br>
          <br>
          {!! $customers->appends(\Request::except('page'))->render() !!}
          <div class="pull-right" style="text-align: right;color:blue">
            <a href="{{ URL::previous() }}">Go Back</a>
          </div>
          </br>
        </div>
      </div>
    </div>
  </div>
</div>
</br>
<script>
  feather.replace()
</script>
@endsection
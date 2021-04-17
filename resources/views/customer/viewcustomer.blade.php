@extends('layouts.app')
@section('title','View Customer')
@section('header','Customer Details')
@section('content')

@if(Auth::user()->can('add-customer', App\Models\customer::class))
  <div class="pull-left" style="text-align:left;color:blue">
    <a href="/addCustomer" class="btn btn-primary"> Add Customer <span data-feather="plus"></a>
  </div>
@endif
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
          <div class="table-responsive">
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
                    <!-- <a href="/deleteCustomer/{{$customer['CustomerID']}}" style="margin:10px" class="text-my-own-color"><i data-feather= "trash-2"></i></a> -->
                    <a href="" style="margin:2px" class="text-my-own-color" data-toggle="modal" data-target="#exampleModal2">
                  <span data-feather="trash-2"></span>
                  </a>

                @endif
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          </div>
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
                You are going to delete the records of  Customer ID  {{$customer['CustomerID']}} -{{$customer['Name']}}. Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="/deleteCustomer/{{$customer['CustomerID']}}"><button type="submit" form="myformproduct" class="btn btn-primary">Continue</button></a>
            </div>
        </div>
    </div>
</div>
</br>
<script>
  feather.replace()
</script>
@endsection
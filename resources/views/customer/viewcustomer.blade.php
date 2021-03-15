@extends('layouts.app')
@section('title','View Customer')
@section('header','Customer Details')
@section('content')
<div class="pull-left">
    <a class="btn btn-primary" href="/addCustomer">Add new Customer</a>
</div>
<br>
<br>
<div class="container " style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Customer Details') }}</div> -->

                <div class="card-body">
<br>

<form action="/Search_Customers" method="GET" role="search">
{{ csrf_field() }}
<div class="input-group">
<input type="text" class="form-control" name="query" id="query"
 placeholder="Search Customers"> <span class="input-group-btn">
<button type="submit" class="btn btn-default">
 <span class="glyphicon glyphicon-search"></span>
  </button>
  </span>
  </div>
</form>

</br>
</br>

<table >
  
    <tr>
      <th>Customer ID</th>
      <th>Customer Name</th>
      <!-- <th>NIC</th> -->
      <th>Address</th>
      <th>Mobile Number</th>
      <th>Email</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($customers as $customer)

    <tr>                                                
      <th >{{$customer['CustomerID']}}</th>
      <td>{{$customer['Name']}}</td>
      <!-- <td>{{$customer['NIC']}}</td> -->
      <td>{{$customer['Address']}}</td>
      <td>{{$customer['MobileNo']}}</td>
      <td>{{$customer['Email']}}</td>
      <td>
          <a href="/editCustomer/{{$customer['CustomerID']}}" style="margin:2px" class="text-my-own-color"><span data-feather="edit"></span></a>
          <a href="/deleteCustomer/{{$customer['CustomerID']}}" style="margin:10px" class="text-my-own-color"><span data-feather= "trash-2"></span></a>
      </td>
    
</tr>
@endforeach
</tbody>
</table>
<br>
<br>
<div style="text-align: right;font-size: 15px;">
<span>{{$customers->links()}}</span>
</div>
</br>
</div></div></div></div></div></div>

</br>


@endsection
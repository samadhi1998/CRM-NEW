@extends('layouts.app')
@section('title','Search Customer')
@section('content')
<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554"> Searched Customer Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
<div class="container">

<div class="table-responsive">
    <table class="table table-striped" borders="2">
    <thead >
    <tr style="height:70px;width:50px">
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">NIC</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
 @foreach($customers as $customer)
    <tr>                                                
    <th scope="row">{{$customer['CustomerID']}}</th>
      <td>{{$customer['Name']}}</td>
      <td>{{$customer['NIC']}}</td>
      <td>{{$customer['Address']}}</td>
      <td>{{$customer['MobileNo']}}</td>
      <td>{{$customer['Email']}}</td>
      
    </tr>
@endforeach
</tbody>
</table>
</div>
<span>{{$customers->links()}}</span>
</div>


@endsection
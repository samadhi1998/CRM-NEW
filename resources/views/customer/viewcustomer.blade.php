@extends('layouts.app')
@section('title','View Customer')
@section('content')

<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554"> Customer Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
<div class="container">
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
<font-size="2" face="Verdana" >
<table class="table table-striped" borders="4" >
  <thead >
    <tr style="height:70px;width:100px">
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">NIC</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($customers as $customer)

    <tr>                                                
      <th >{{$customer['CustomerID']}}</th>

      <td>{{$customer['Name']}}</td>
      <td>{{$customer['NIC']}}</td>
      <td>{{$customer['Address']}}</td>
      <td>{{$customer['MobileNo']}}</td>
      <td>{{$customer['Email']}}</td>
      <td>

     <tab></tab>
          <a href="/editCustomer/{{$customer['CustomerID']}}" style="margin:2px"><button > Update</button></a><tab></tab>
          
          </br>
          </br>
          <a href="/deleteCustomer/{{$customer['CustomerID']}}" style="margin:10px"><button> Delete</button></a>
          
          
      </td>
    
</tr>
@endforeach
</tbody>
</table>
</font-size>
</br>
<div style="text-align: right;font-size: 15px;">
<span>{{$customers->links()}}</span>
</div>
</br>

@endsection
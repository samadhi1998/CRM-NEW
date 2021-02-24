@extends('layouts.app')
@section('title','View Charge')
@section('content')
<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">View Charges Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <br>
        <br>
        <div class="container">
        <form action="/Search_Chargers" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
     <input type="text" class="form-control" name="query" id="query"
         placeholder="Search Chargers Details."> <span class="input-group-btn">
     <button type="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-search"></span>
  </button>
  </span>
  </div>
</form>
</br>
        <br>
<table class="table table-striped"borders="4" border-color="#233554" >
  <thead >
    <tr style="height:70px;width:100px ; text-align:center; color:#233554">
       <th scope="col">Extra-Charge ID </th>
      <th scope="col">Order ID</th>
      <th scope="col">ServicePerson ID</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($extra_charge as $extra_charges)
    <tr>                                                
      <th scope="row">{{ $extra_charges['ExtraChargeID']}}</th>
      <td>{{$extra_charges['OrderID']}}</td>
      <td>{{$extra_charges['ServicePersonID']}}</td>
      <td>{{$extra_charges['Type']}}</td>
      <td>{{$extra_charges['Amount']}}</td>
      <td>{{$extra_charges['Description']}}</td>
      <td>
      <a href= {{"UpdateChargers/".$extra_charges['ExtraChargeID']}}  ><button> Update</button></a><tab></tab>
     
    </td>
</tr>
@endforeach

</tbody>
</table>
<br>
<br>
</br>
<div style="text-align: right;font-size: 15px;">
<span>{{$extra_charge->links()}}</span>


@endsection
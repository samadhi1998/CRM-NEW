
@extends('layouts.app')
@section('title','Search Charge')
@section('content')


<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Searched Charges Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <br>
<table class="table table-striped"borders="4" border-color="#233554" >
  <thead >
    <tr style="height:70px;width:100px ; text-align:center; color:#233554">
      <th scope="col">Order ID</th>
      <th scope="col">ServicePerson ID</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Description</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($extra_charge as $extra_charges)
    <tr>                                                
      <th scope="row">{{ $extra_charges['OrderID']}}</th>
      <td>{{$extra_charges['ServicePersonID']}}</td>
      <td>{{$extra_charges['Type']}}</td>
      <td>{{$extra_charges['Amount']}}</td>
      <td>{{$extra_charges['Description']}}</td>
      
</tr>
@endforeach

</tbody>
</table>
<br>
<br>
</br>
<div style="text-align: right;font-size: 15px;">


@endsection
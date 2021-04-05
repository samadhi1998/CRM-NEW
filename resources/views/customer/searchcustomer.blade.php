@extends('layouts.app')
@section('title','Search Customer')
@section('content')
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table >
                        <thead >
                            <tr>
                                <th >Customer ID</th>
                                <th >Customer Name</th>
                                <th >NIC</th>
                                <th >Address</th>
                                <th >Mobile Number</th>
                                <th >Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>                                                
                                <td>{{$customer['CustomerID']}}</th>
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
                </div>
                {{$customers->links()}}
                <div class="pull-right" style="text-align: right;color:blue">
                    <a href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
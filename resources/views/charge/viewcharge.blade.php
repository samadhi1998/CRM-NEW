@extends('layouts.app')
@section('title','View Charge')
@section('header','View Additional Charges')
@section('content')
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
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

                        <form action="/Search_Chargers" method="GET" role="search">
                        {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" id="query"
                                placeholder="Search Chargers Details."> 
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </br>
                    <br>
                    <div class="table-responsive">
                    <table>
                        <tr>
                            <th>@sortablelink('ExtraChargeID')</th>
                            <th>Order ID</th>
                            <th>ServicePerson ID</th>
                            <th>Type</th>
                            <th>@sortablelink('Amount')</th>
                            <th>@sortablelink('Description')</th>
                            <th>Action</th>
                        </tr>
                        @if($extra_charge->count())
                        @foreach($extra_charge as $extra_charges)
                        <tr>                                                
                            <td>{{$extra_charges['ExtraChargeID']}}</td>
                            <td>{{$extra_charges['OrderID']}}</td>
                            <td>{{$extra_charges['ServicePersonID']}}</td>
                            <td>{{$extra_charges['Type']}}</td>
                            <td> Rs.{{ number_format($extra_charges->Amount, 2) }}</td>
                            <td>{{$extra_charges['Description']}}</td>

                            @if(Auth::user()->can('view-charge-information', App\Models\extra_charge::class))
                                <a href="/ExtrachargeInformation/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
                            @endif
                            @if(Auth::user()->can('edit-charge', App\Models\extra_charge::class))
                                <a href= "/UpdateChargers/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
                            @endif
                            
                            <a href="" style="margin:2px" class="text-my-own-color" data-toggle="modal" data-target="#exampleModal2">
                             <span data-feather="trash-2"></span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    </div>
                    <br>
                    <br>
                    {!! $extra_charge->appends(\Request::except('page'))->render() !!}
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
                You are going to delete the records of  Charge ID {{$extra_charges['ExtraChargeID']}} . Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="/deleteChargers/{{$extra_charges['ExtraChargeID']}}"><button type="submit" form="myformproduct" class="btn btn-primary">Continue</button></a>
            </div>
        </div>
    </div>
</div>
</br>
<script>
  feather.replace()
</script>

@endsection
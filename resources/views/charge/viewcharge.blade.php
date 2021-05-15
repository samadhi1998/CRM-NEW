@extends('layouts.app')
@section('title','View Charge')
@section('header','View Additional Charges')
@section('content')
@if(Auth::user()->roles->name == 'Super-Admin')
<div class="pull-right">
    <a class="btn btn-primary" href="/restoreChargers"> Restore Deleted Charges</a>
</div>
@endif
<br>
<br>
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
                            <td>
                            @if(Auth::user()->can('view-charge-information', App\Models\extra_charge::class))
                                <a href="/ExtrachargeInformation/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
                            @endif
                            @if(Auth::user()->can('edit-charge', App\Models\extra_charge::class))
                                <a href= "/UpdateChargers/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
                            @endif
                            @if(Auth::user()->can('delete-charge', App\Models\extra_charge::class))
                            <a href="/deleteChargers/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color" onclick="return confirm('Are you sure you want to delete this item?');">
                             <span data-feather="trash-2"></span>
                             @endif
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
</br>
<script>
  feather.replace()
</script>

@endsection
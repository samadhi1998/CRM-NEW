@extends('layouts.app')
@section('title','Sales Report')
@section('header','Daily Sales Report')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-md">           
            <form action="{{ route('report') }}" method="get">          
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ---Select Report Cetogory---
                    </button>
                    <br><br>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="http://127.0.0.1:8000/byweekly">Weekly Sales Report</a>
                        <a class="dropdown-item" href="http://127.0.0.1:8000/bymonthly">Monthly Sales Report</a>
                        <a class="dropdown-item" href="http://127.0.0.1:8000/salesreport">Other Sales Report</a>
                    </div>
                    <br><br>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5>
                                            <span data-feather = "calendar" style="width: 30px; height: 30px" class="text-my-own-color" ></span> 
                                            <span class="text-muted">Date : </span> {{$date}}
                                        </h5>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5>
                                            <span data-feather = "shopping-cart" style="width: 30px; height: 30px" class="text-my-own-color" ></span> 
                                            <span class="text-muted">No of Sales : </span> {{$countInvo}}
                                        </h5>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5>
                                            <span data-feather = "help-circle" style="width: 30px; height: 30px" class="text-my-own-color" ></span> 
                                            <span class="text-muted">Pending Orders : </span> {{$countQuo}}
                                        </h5>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <br><br>
                <div class="card">          
                    <div class="row invoice-header px-3 py-4">
                        <div class="col-12 text-center">
                            <h3> Winsoft Holdings (Pvt) Ltd. </h3>      
                            <h4> Daily Sales Report </h4> 
                            <h5><b> {{ $date }} </b></h5>                      
                        </div>           
                        <div class="table-responsive">
                        <?php $total_d = 0; ?>
                            <table>
                                <tr> 
                                    <th>Order No</th>
                                    <th>Customer </th> 
                                    <th>Email </th> 
                                    <th>Date</th>
                                    <th>Items</th>                                                
                                </tr>
                                @foreach ($daily as $order)
                                <tr>
                                    <td >{{ $order->OrderID }}</td>
                                    <td>{{ $order->Customer }}</td>
                                    <td>{{ $order->Email }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <ul>
                                            @foreach($products as $item)                                         
                                                @if ( $order->OrderID === $item->OrderID)
                                                    @foreach($item->products as $p)
                                                        <li>{{ $p->Name }} (Rs.{{ $p->Price }} x {{ $p->pivot->Qty }})</li>
                                                        <?php $total_d = $total_d + ($p->Price * $p->pivot->Qty ); ?>  
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </ul>                               
                                    </td>                              
                                </tr>   
                                @endforeach                                           
                            </table>  
                        </div>
                    </div>  
                    <br><br>
                    <div class="col-sm-3"> 
                        <h5>
                            <span class="text-muted">Total Sales : Rs. </span> <?php echo  number_format  ($total_d)."<br>"; ?>
                        </h5>                                          
                    </div>
                    <div align="right">                              
                        <a class="btn btn-primary" href="http://127.0.0.1:8000/sendpdfdaily">Save as PDF</a> 
                        <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                    </div><br>                      
                </div>              
            </form>
        </div>
    </div>
</div>
@endsection

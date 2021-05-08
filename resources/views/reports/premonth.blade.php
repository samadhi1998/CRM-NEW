@extends('layouts.app')
@section('title','Sales Report')
@section('header','Sales Report Monthly')
@section('content')


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-md">           
            <form action="{{ route('report') }}" method="get">          
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5>
                                            <span data-feather = "calendar" style="width: 30px; height: 30px" class="text-my-own-color" ></span> 
                                            <span class="text-muted">Date Period : 
                                        </h5>     
                                        <h6> 
                                            <b>{{$start}} - {{$end}}</b>
                                        <h6>                                
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
                                            <span data-feather = "calendar" style="width: 30px; height: 30px" class="text-my-own-color" ></span> 
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
                                    <h3 class="Name">ABS-CBN CORPORATION</h3>                      
                                    <h4 style="text-align: center; color:#233554">Monthly Sales Report</h4>   
                                    <h6 style="text-align: center; color:#233554"><b>{{ $start }}  -  {{ $end }} </b></h6>                      
                            </div>   
                            <div class="table-responsive">
                            <?php $total_p = 0; ?>
                                <table>
                                    <tr> 
                                        <th>Order No</th>
                                        <th>Customer </th> 
                                        <th>Email </th> 
                                        <th>Updated Date</th>
                                        <th>Product Name</th>                                             
                                    </tr>
                                    @foreach ($premonth as $order)
                                    <tr>
                                        <td>{{ $order->OrderID }}</td>
                                        <td>{{ $order->Customer }}</td>
                                        <td>{{ $order->Email }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                        <td>
                                            <ul>
                                                @foreach($products as $item)                                         
                                                    @if ( $order->OrderID === $item->OrderID)
                                                        @foreach($item->products as $p)
                                                            <li>{{ $p->Name }} (Rs.{{ $p->Price }} x {{ $p->pivot->Qty }})</li>
                                                            <?php $total_p = $total_p + ($p->Price * $p->pivot->Qty ); ?>  
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
                                <span class="text-muted">Total Sales : Rs. </span> <?php echo  number_format  ($total_p)."<br>"; ?>
                            </h5>                                          
                        </div>
                        <div align="right">
                            <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                        </div>
                        <br>
                    </div>              
            </form>
        </div>
    </div>
</div>
 @endsection


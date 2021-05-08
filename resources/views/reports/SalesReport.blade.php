@extends('layouts.app')
@section('title','Sales Report')
@section('header','Sales Report')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-md">           
            <form action="{{ route('report') }}" method="get">               
                <div class="row">
                    <div class="col-md-3" style="margin-top: 24px; margin-left: 30px">
                        <label for="">From: <input type="date" class="form-control" name="First_date"> </label>   
                    </div>
                    <div class="col-md-3" style="margin-top: 24px; margin-left: 30px">
                        <label for="">To:  <input type="date" class="form-control" name="Last_date"> </label>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="margin-top: 5px; margin-left: 30px">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="card"> 
                            <div class="row invoice-header px-3 py-4">
                                <div class="col-12 text-center">
                                    <h2 class="Name">ABS-CBN CORPORATION</h2>
                                    <h5>No.95, Galle Road, Moratuwa</h5>
                                    <h6>Tel : +(94) 112 605 731</h6>
                                    <h6>Email :<a href="mailto:buyabc@abcgroup.com"> buyabc@abcgroup.com</a></h6>
                                    <hr>        
                                    <h4 style="text-align: center; color:#233554">Sales Report</h4><br>                   
                                </div>    
                                <div class="table-responsive">
                                <?php $total_s = 0; ?>
                                    <table>
                                        <tr> 
                                            <th>Order No</th>
                                            <th>Customer </th> 
                                            <th>Email</th> 
                                            <th>Updated Date</th>
                                            <th>Items</th>                                             
                                        </tr>
                                        @foreach ($orders as $order)
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
                                                                <li>{{ $p->Name }} (Rs.{{ $p->Price }})</li>
                                                                <?php $total_s = $total_s + ($p->Price * $p->pivot->Qty ); ?>  
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
                            <br>
                            <div class="col-sm-3"> 
                                <h5>
                                    <span class="text-muted">Total Sales : Rs. </span> <?php echo  number_format  ($total_s)."<br>"; ?>
                                </h5>                                          
                            </div>
                            <div align="right">
                                <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                            </div>
                           <br>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>                     
@endsection

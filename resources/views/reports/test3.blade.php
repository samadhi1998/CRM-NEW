<html>
    <head>
        <title> Monthly Sales Report </title>
            <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                max-width: 2480px;
                width: 100%;
                }
                td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                width: auto;
                overflow: hidden;
                word-wrap: break-word;
                }
                th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #dddddd;  
                color: black;
                }
                h2,h3,h4{
                    text-align: center;
                    margin-bottom: -12px;
                    }   
            </style>
    </head>
    <body>
        <div class="container" style="background :none !important ">
            <div class="row justify-content-center">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">   
                            <form action="{{ route('report') }}" method="get">  
                                <div>
                                    <h2>ABS-CBN CORPORATION</h2>
                                    <h3>No.95, Galle Road, Moratuwa</h3>
                                    <h4>Tel : +(94) 112 605 731</h4>
                                    <h4>E-mail : <a href="mailto:buyabc@abcgroup.com"> buyabc@abcgroup.com</a></h4>
                                    <br><br><hr>
                                </div>    
                                <h2 style="text-align: center; color:#233554">Monthly Sales Report : {{ $first_day_this_month }}  -  {{ $last_day_this_month }} </h2>                           
                                <br><br>     
                                    <div class="table-responsive">
                                    <?php $total_m = 0; ?>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="5px">Order No</th>
                                                    <th width="30px">Customer </th> 
                                                    <th width="70px">Date</th>
                                                    <th width="280px">Items</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($current_month as $order)
                                                <tr>
                                                    <td>{{ $order->OrderID }}</td>
                                                    <td>{{ $order->Customer }}</td>
                                                    <td>{{ $order->updated_at }}</td>
                                                    <td>
                                                        <ul style="list-style-type:none;">
                                                            @foreach($products as $item)                                         
                                                                @if ( $order->OrderID === $item->OrderID)
                                                                    @foreach($item->products as $p)
                                                                        <li>{{ $p->Name }}(Rs.{{ $p->Price }} x {{ $p->pivot->Qty }})</li>
                                                                        <?php $total_m = $total_m + ($p->Price * $p->pivot->Qty ); ?>  
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </td>                                            
                                                </tr>   
                                                @endforeach  
                                            </tbody>                                         
                                        </table>  
                                        <br>
                                        <div class="col-sm-3"> 
                                            <h3 style="text-align:left">
                                                <span class="text-muted">No of Pending Orders :  </span> {{$countQuo}}<br>
                                                <span class="text-muted">No of Sales :  </span> {{$countInvo}}<br>
                                                <span class="text-muted">Total Sales : Rs. </span> <?php echo  number_format  ($total_m)."<br>"; ?>
                                            </h3>                                          
                                        </div>
                                    </div>                   
                            </form>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
 

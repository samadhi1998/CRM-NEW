
<html>
    <head>
        <title> INVOICE </title>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }
            td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }
            th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #dddddd;  
            color: black;
            }
            div.invoice-header > div >h2,h3,h4{
                text-align: center;
                margin-bottom: -12px;
                }
            h1 {
            font-size: 23px;
            margin-bottom: -10px;
            }
            h5 {
            font-size: 18px;
            margin-bottom: -23px;
            font-weight: normal;
            }        
        </style>
    </head>
    <body>
        @foreach ($orders as $ord)
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row invoice-header px-3 py-4">
                            <div class="card-body">
                                <div class="col-12 text-center">
                                    <h2 class="Name">Winsoft Holdings (Pvt) Ltd.</h2>
                                    <h3>No.95, Galle Road, Moratuwa</h3>
                                    <h4>Tel : +(94) 112 605 731</h4>
                                    <h4>E-mail :<a href="mailto:winsoft@winsoftlk.com"> winsoft@winsoftlk.com</a></h4>
                                    <br><br><hr>
                                    <h2 class="Name">{{ $ord->Status }}</h2>
                                </div> 
                            </div> 
                        </div>  
                        <br><br>
                        <div>                                       
                            <h1><b>Order No #{{ $ord->OrderID }}</b></h1>
                            <h5>Payment Due: {{$ord->Due_date}}</h5>
                            <h5>Issued: {{ $ord->created_at }}</h5>
                        </div>
                        <br><br>
                        <div>
                            <h5><b>{{ $ord->CustomerName }}</b></h5>
                            <h5>{{ $ord->Address }}</h5>
                            <h5>{{ $ord->MobileNo }}</h5>
                            <h5>{{ $ord->Email }}</h5> 
                        </div>  
                        <br><br><hr><br>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center"> Description  </th>
                                        <th class="text-center"> Unit Price  </th>
                                        <th class="text-center"> Quantity  </th>
                                        <th class="text-center"> Total  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($orders as $ord)
                                    <tr>
                                        <td></td>
                                        <td>{{ $ord->ProductName }} </td>   
                                        <td style="text-align: right">{{ number_format ($ord->Price) }} </td>   
                                        <td style="text-align: right">{{ $ord->Qty }} </td>   
                                        <td style="text-align: right">{{ number_format ($ord->Price * $ord->Qty) }} </td>   
                                        <?php $total = $total + ($ord->Price * $ord->Qty); ?>      
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"><b>Total Amount</b></td>
                                        <td style="text-align: right"><b><?php echo number_format  ($total)."<br>"; ?>
                                    </tr> 
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"> (-) Discount</td>
                                        <td style="text-align: right">{{ number_format ($ord->Discount) }}</td>
                                    </tr>                                                        
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2" > (-) Advance</td>
                                        <td style="text-align: right">{{ number_format ($ord->Advance) }} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"><b>Balance</b></td>
                                        <td style="text-align: right"><b>{{ number_format ($total - $ord->Discount - $ord->Advance) }}</b></td>
                                    </tr>
                                </tfoot>                              
                            </table>
                            <br><br>
                        </div>                       
                    </div>
                </div>   
            </div>                    
            @break
        @endforeach
    </body>
</html>
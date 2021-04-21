
<html>
    <head>
        <title>ABS-CBN CORPORATION - Invoice</title>
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
    </head>
    <body>
        @foreach ($orders as $ord)
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <header class="header">
                        <div id="invoice">
                            <div class="invoice overflow-auto">
                                <div style="min-width: 600px">
                                    <header>
                                    <div class="row invoice-header px-3 py-4">
                                        <div class="col-12 text-center">
                                            <h2 class="Name">ABS-CBN CORPORATION</h2>
                                            <h4>No.95, Galle Road, Moratuwa</h4>
                                            <h4>Tel : +(94) 112 605 731</h4>
                                            <h4>email : <a href="mailto:buyabc@abcgroup.com"> buyabc@abcgroup.com</a></h4>
                                            <hr>
                                        </div> 
                                    </div>
                                    </header>
                                    <div class="col invoice-details">
                                            <h2 class="invoice-id">{{ $ord->Status }}</h2>
                                            <h3>Order No #{{ $ord->OrderID }}</h3>
                                            <h4><b><p>
                                                Payment Due: {{$ord->Due_date}} <br>
                                                Issued: {{ $ord->created_at }}
                                            </p></b></h4>
                                            <br> 
                                        </div>
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <h5>INVOICE TO :</h5>
                                                <div class="to"><b>{{ $ord->CustomerName }}</b>
                                                <div class="address">{{ $ord->Address }}</div>
                                                <div class="mobile">{{ $ord->MobileNo }}</div>
                                                <div class="email">{{ $ord->Email }}</div>
                                            <br><br>
                                        </div>                              
                                    </div>       
                                    <div id="table">
                                    <table class="table table-bordered">
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
                                            @foreach($orders as $ord)
                                                <tr>
                                                    <th></th>
                                                    <td>{{ $ord->ProductName }} </td>   
                                                    <td>{{ $ord->Price }} </td>   
                                                    <td>{{ $ord->Qty }} </td>   
                                                    <td>{{ $ord->Price * $ord->Qty }} </td>        
                                                </tr>
                                                @endforeach
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2"><p>Total Price</p></td>
                                                <td>  </td>
                                            </tr> -->
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2"><p> (-) Discount</p></td>
                                                <td>{{ $ord->Discount }}</td>
                                            </tr>                          
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2"><p>(-) Advance</p></td>
                                                <td>{{ $ord->Advance }} </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2"><p>Balance</p></td>
                                                <td>{{ ($ord->Price * $ord->Qty) - $ord->Discount - $ord->Advance }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                </header>
                            </div>
                        </div>  
                    </div>
                </div>              
        </div>

        @break
        @endforeach

    </body>
</html>
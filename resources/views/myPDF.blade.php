
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
                                <div class="row">                                           
                                    <div class="col company-details">
                                        <h1 class="Name">ABC PVT(LTD).</h1>
                                        <div>No.95, Galle Road, Moratuwa</div>
                                        <div>+(94) 112 605 731</div>
                                        <div><a href="mailto:buyabc@abcgroup.com">buyabc@abcgroup.com</a></div><br>
                                        <hr/>
                                    </div>
                                </div>
                            </header>
                            <div class="col invoice-details">
                                    <h2 class="invoice-id">{{ $ord->Status }}</h2>
                                    <h3>Order No #{{ $ord->OrderID }}</h3>
                                        <p> Payment Due: {{$ord->Due_date}} <br><br>
                                            Issued: {{ $ord->created_at }}
                                        </p> 
                                    <br> 
                                </div>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <h6>INVOICE TO :</h6>
                                    <h4 class="to"><b>{{ $ord->CustomerName }}</b></h4>
                                    <div class="address">{{ $ord->Address }}</div>
                                    <div class="mobile">{{ $ord->MobileNo }}</div>
                                    <div class="email">{{ $ord->Email }}</div><br><br>
                                </div>                              
                            </div>       
                            <div id="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
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
                                        @break
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"><p>Total Price</p></td>
                                        <td>  </td>
                                    </tr>
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
                                        <td></td>
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

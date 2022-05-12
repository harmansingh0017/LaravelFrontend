@extends('layouts.app')

@section('content')

        <div class="container">
      
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>Cart </h2>
            </div>
            <hr>
            <div class="row">
                <div class="d-flex flex-lg-wrap oShadow">
                    <div class="panel panel-default height">
                        <div class="panel-heading"><h4>Billing Details</h4></div>
                        <div class="panel-body">
                            <strong>{{$name}}</strong><br>
                            {{$address}}<br>
                            {{$email}}<br>
                           <strong>{{$phone}}</strong><br>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-lg-wrap oShadow">
                    <div class="panel panel-default height">
                        <div class="panel-heading"><h4>Payment </h4></div>
                        <div class="panel-body">
                            <strong>Card Name:</strong> Visa<br>
                            <strong>Card Number:</strong> ***** 332<br>
                            <strong>Exp Date:</strong> 09/2020<br>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-lg-wrap oShadow">
                    <div class="panel panel-default height">
                        <div class="panel-heading"><h4>Order Preferences</h4></div>
                        <div class="panel-body">
                            <strong>Gift:</strong> No<br>
                            <strong>Express Delivery:</strong> Yes<br>
                            <strong>Insurance:</strong> No<br>
                            <strong>Coupon:</strong> No<br>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-lg-wrap oShadow">
                    <div class="panel panel-default height">
                        <div class="panel-heading"><h4>Shipping Address</h4></div>
                        <div class="panel-body">
                            <strong>{{$name}}</strong><br>
                            {{$address}}<br>
                            {{$email}}<br>
                           <strong>{{$phone}}</strong><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                   
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                            @if (is_array($cart) || is_object($cart))
                            @foreach($cart as $produc)
                                <tr>
                                    <td>{{ $produc['name'] }}</td>
                                    <td class="text-center">{{ $produc['price'] }}</td>
                                    <td class="text-center">{{ $produc['no_items'] }}</td>
                                    <td class="text-right">{{ $produc['price']*$produc['no_items'] }}</td>
                                    <td class="text-right"><form action="/cart/{{ $produc['id'] }}" method="POST">
                                               @csrf
                                              @method('DELETE')
                                             <button>Delete Order</button>
                                     </form></td>
                                </tr>  
                                @endforeach
                        @endif                          
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">DKK:{{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





 <!--DONT DELETE IT-->
 
<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

@endsection


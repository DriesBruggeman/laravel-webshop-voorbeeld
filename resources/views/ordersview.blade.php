@extends('master')
@section('pageTitle', 'View Orders')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <div class="container">

            @if(count($orders) > 0)
                @foreach($orders as $order)
                    <div class="order">
                        <div class="order-status">
                            <p>Status: @if($order->deliverd) AFGELEVERD @else IN BEHANDELING @endif</p>
                            <p>Levertermijn: @if($order->deliveryDate) {{ $order->deliveryDate }} @else onbekend @endif</p>
                            <p>Betaald: @if($order->paid) JA @else NEE @endif</p>
                        </div>

                        @foreach($order->OrderDetails as $orderDetail)
                            <div class="cart-product-details">
                                <div>
                                    <img src="{{ asset('storage/' . $orderDetail->Product->mainImage) }}" alt="">
                                </div>
                                <div>
                                    <h3>{{ $orderDetail->Product->name }}</h3>
                                </div>
                                <div class="qtyControl">
                                    <p>Quantity: {{ $orderDetail->amount }}</p>
                                </div>
                                <div class="subTotal">
                                    €{{ $orderDetail->subtotal }}
                                </div>
                            </div>
                        @endforeach
                            <div class="total">
                                <p>Order total: €{{ $order->totalPrice }}</p>
                            </div>
                            @if($order->notes)
                            <div class="order-notes">
                                <p>Order notes:</p>
                                <p>{{ $order->notes }}</p>
                            </div>
                            @endif
                    </div>
                @endforeach
            @else
                You have no orders
                <a href="{{ route('store') }}">Back to store.</a>
            @endif
    </div>
    <!-- /SECTION -->
@endsection

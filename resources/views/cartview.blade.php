@extends('master')
@section('pageTitle', 'View Cart')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <div class="container">

            @if($cart ?? '')
                @foreach($cart->products as $product)
                <div class="cart-product-details">
                    <div>
                        <img src="{{ asset('storage/' . $product['product']->mainImage) }}" alt="">
                    </div>
                    <div>
                        <h3>{{ $product['product']->name }}</h3>
                        <a href="{{ route('removeFromCart', ['id'=>$product['product']->id, 'amount' => $product['qty']]) }}">Remove from cart</a>
                    </div>
                    <div class="qtyControl">
                        <a href="{{ route('removeFromCart', ['id'=>$product['product']->id, 'amount' => 1]) }}">-</a>
                        <p>Quantity: {{ $product['qty'] }}</p>
                        <a href="{{ route('addToCart', ['id'=>$product['product']->id, 'amount' => 1]) }}">+</a>
                    </div>
                    <div class="subTotal">
                        @if($product['product']->discount == null || $product['product']->discount == 0)
                            <p>Sub total: €{{ $product['price'] }}</p>
                        @else
                            <p>Sub total: €{{ $product['price'] }}</p>
                            <del class="product-old-price">Sub total: €{{ $product['product']->price * $product['qty'] }}</del>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="total">
                    <p>Total: €{{ $cart->totalPrice }}</p><a href="{{ route('checkout') }}" class="primary-btn order-submit">Checkout</a>
                </div>
            @else
                Your cart is empty.
                <a href="{{ route('store') }}">Back to store.</a>
            @endif
    </div>
    <!-- /SECTION -->
@endsection

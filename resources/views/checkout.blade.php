@extends('master')
@section('pageTitle', 'Checkout')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    @include('errors')
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first-name" placeholder="First Name" @auth value="{{ $user->firstname }}" disabled @endauth>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last-name" placeholder="Last Name" @auth value="{{ $user->lastname }}" disabled @endauth>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email" @auth value="{{ $user->email }}" disabled @endauth>
                        </div>

                        @if($address)
                        <form method="post" action="{{ route('updateAddress') }}">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-group">
                                <input class="input" type="text" name="streetname" placeholder="Streetname" value="{{ old('streetname', $address->streetname) }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="streetnumber" placeholder="Streetnumber" value="{{ old('streetnumber', $address->streetnumber) }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="postalcode" placeholder="Postalcode" value="{{ old('postalcode', $address->postalcode) }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City" value="{{ old('city', $address->city) }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country" value="{{ old('country', $address->country) }}">
                            </div>
                            <button type="submit" class="primary-btn order-submit">Update Address</button>
                        </form>
                        @else
                        <form method="post" action="{{ route('createAddress') }}">
                            @csrf
                            <div class="form-group">
                                <input class="input" type="text" name="streetname" placeholder="Streetname" value="{{ old('streetname', '') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="streetnumber" placeholder="Streetnumber" value="{{ old('streetnumber', '') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="postalcode" placeholder="Postalcode" value="{{ old('postalcode', '') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City" value="{{ old('city', '') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country" value="{{ old('country', '') }}">
                            </div>
                            <button type="submit" class="primary-btn order-submit">Create Address</button>
                        </form>
                        @endif
                        <!--
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                        </div>
                        -->
                    </div>
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    <div class="shiping-details">
                        <div class="section-title">
                            <h3 class="title">Shipping address</h3>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="shipping-address" name="differentAddress" @if($shippingAddress) checked @endif form="placeOrderForm">
                            <label for="shipping-address">
                                <span></span>
                                Ship to a diffrent address?
                            </label>
                            @if($shippingAddress)
                                <div class="caption">
                                    <form method="post" action="{{ route('updateShippingAddress') }}" >
                                        {{ method_field('patch') }}
                                        @csrf
                                        <div class="form-group">
                                            <input class="input" type="text" name="shipping-streetname" placeholder="Streetname" value="{{ old('shipping-streetname', $shippingAddress->streetname) }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="shipping-streetnumber" placeholder="Streetnumber" value="{{ old('shipping-streetnumber', $shippingAddress->streetnumber) }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="shipping-postalcode" placeholder="Postalcode" value="{{ old('shipping-postalcode', $shippingAddress->postalcode) }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="shipping-city" placeholder="City" value="{{ old('shipping-city', $shippingAddress->city) }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="shipping-country" placeholder="Country" value="{{ old('shipping-city', $shippingAddress->country) }}">
                                        </div>
                                        <button type="submit" class="primary-btn order-submit">Update Shipping Address</button>
                                    </form>
                                    <form method="post" action="{{ route('removeShippingAddress') }}" style="margin-top: 10px">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <button type="submit" class="primary-btn order-submit">Remove Shipping Address</button>
                                    </form>
                                </div>
                            @else
                            <form method="post" action="{{ route('createShippingAddress') }}" class="caption">
                                @csrf
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping-streetname" placeholder="Streetname" value="{{ old('shipping-streetname', '') }}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping-streetnumber" placeholder="Streetnumber" value="{{ old('shipping-streetnumber', '') }}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping-postalcode" placeholder="Postalcode" value="{{ old('shipping-postalcode', '') }}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping-city" placeholder="City" value="{{ old('shipping-city', '') }}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping-country" placeholder="Country" value="{{ old('shipping-city', '') }}">
                                </div>
                                <button type="submit" class="primary-btn order-submit">Create Shipping Address</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea form="placeOrderForm" class="input" placeholder="Order Notes" name="notes">{{ old('notes', '') }}</textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <form method="post" action="{{ route('placeOrder') }}" class="col-md-5 order-details" id="placeOrderForm">
                    @csrf
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach($cart->products as $product)
                            <div class="order-col">
                                <div>{{ $product['qty']}}x {{ $product['product']->name }}</div>
                                <div>€{{ $product['price'] }}</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div>Shipping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">€{{ $cart->totalPrice }}</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Direct Bank Transfer
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Cheque Payment
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Paypal System
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" name="termsandconditions">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Place order</button>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

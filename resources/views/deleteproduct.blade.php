@extends('master')
@section('pageTitle', 'Delete product')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        @yield('errors')
        <form class="container" method="post" action="{{ route('deleteProduct') }}">
            {{ method_field('delete') }}
            @csrf
                <input type="hidden" name="productId" value="{{$product->id}}">
            <!-- row -->
            @include('errors')
            <div class="row">
                <div class="col-md-3">
                    <!-- Billing Details -->
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $product->mainImage )}}" alt="">
                            <div class="product-label">
                                @if($product->discount > 0)
                                    <span class="sale">-{{ $product->discount }}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->category->name}}</p>
                            <h3 class="product-name"><a href="/store/product/{{$product->id}}">{{$product->name}}</a></h3>
                            @if($product->discount == null || $product->discount == 0)
                                <h4 class="product-price">€{{$product->price}}</h4>
                            @else
                                <h4 class="product-price">€{{$product->price - $product->price/100*$product->discount}} <del class="product-old-price">€{{$product->price}}</del></h4>
                            @endif
                            <div class="product-rating">
                                @if($product->rating() != null)
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($product->rating() >= $i)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3>Are you sure you want to delete this product?</h3>
                    <input type="submit" class="primary-btn order-submit" value="Delete">
                    <a href="{{ url('/store/') }}" class="primary-btn order-submit">No, back</a>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </form>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

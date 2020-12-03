@extends('master')
@section('pageTitle', 'Elctro - Home')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach($categories->take(3) as $cat)
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="{{ 'storage/' . $cat->products->first()->mainImage }}" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>{{$cat->name}}<br>Collection</h3>
                                <a href="/store/category/{{ $cat->id }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- /shop -->

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $cat)
                                    <li><a data-toggle="tab" href="#tab1">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($newProducts as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/' . $product->mainImage )}}" alt="">
                                            <div class="product-label">
                                                @if($product->discount > 0)
                                                <span class="sale">-{{ $product->discount }}%</span>
                                                @endif
                                                <span class="new">NEW</span>
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
                                            <form class="product-btns">
                                                @can('mod-product')
                                                    <button formaction="{{ route('deleteProductform', ['id' => $product->id]) }}" class="add-to-delete"><i class="fa fa-trash"></i><span class="tooltipp">Delete item</span></button>
                                                    <button formaction="{{ route('editProductform', ['id' => $product->id]) }}" class="add-to-edit"><i class="fa fa-edit"></i><span class="tooltipp">Edit item</span></button>
                                                @endcan
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </form>
                                        </div>
                                        <div class="add-to-cart">
                                            <form method="get" action="{{ route('addToCart', ['id' => $product->id, 'amount' => 1]) }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></form>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

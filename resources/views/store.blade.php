@extends('master')
@section('pageTitle', 'Elctro - Store')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">

                            @foreach($categories as $cat)
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-{{ $cat->id }}">
                                <label for="category-{{ $cat->id }}">
                                    <span></span>
                                    {{$cat->name}}
                                    <small>({{ $products->where('category_id', $cat->id)->count() }})</small>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            @foreach($brands as $brand)
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-{{ $brand->brand }}">
                                <label for="brand-{{ $brand->brand }}">
                                    <span></span>
                                    {{ $brand->brand }}
                                    <small>({{ $products->where('brand', $brand->brand)->count() }})</small>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    @can('mod-product')
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Admin Controls</h3>
                        <a href="{{ route('createProductForm') }}">New Item</a>
                    </div>
                    <!-- /aside Widget -->
                    @endcan
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset('storage/' . $product->mainImage)}}" alt="">
                                    <div class="product-label">
                                        @if($product->discount > 0)
                                            <span class="sale">-{{ $product->discount }}%</span>
                                        @endif
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->name}}</p>
                                    <h3 class="product-name"><a href="/store/product/{{ $product->id }}">{{$product->name}}</a></h3>
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
                                        <!-- Use of buttons instead of <a href=""></a> beacause of bootstrap tooltipp class -->
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
                        </div>
                        @endforeach
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

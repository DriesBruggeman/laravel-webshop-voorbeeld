@extends('master')
@section('pageTitle')
    Elctro - {{ $mainProduct->name }}
@endsection
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            @include('errors')
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{ asset('storage/' . $mainProduct->mainImage) }}" alt="">
                        </div>

                        @foreach($mainProduct->images as $image)
                        <div class="product-preview">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{ asset('storage/' . $mainProduct->mainImage) }}" alt="">
                        </div>

                        @foreach($mainProduct->images as $image)
                            <div class="product-preview">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $mainProduct->name }}</h2>
                        <div>
                            @if($mainProduct->rating() != null)
                                @for($i = 1; $i <= 5; $i++)
                                    @if($mainProduct->rating() >= $i)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            @endif
                            <a class="review-link" href="#">{{$mainProduct->reviews->count()}} Review(s) | Add your review</a>
                        </div>
                        <div>
                            @if($mainProduct->discount == null || $mainProduct->discount == 0)
                                <h3 class="product-price">€{{$mainProduct->price}}</h3>
                            @else
                                <h3 class="product-price">€{{$mainProduct->price - $mainProduct->price/100*$mainProduct->discount}} <del class="product-old-price">€{{$mainProduct->price}}</del></h3>
                            @endif
                            @if($mainProduct->stock > 5)
                                <span class="product-available">In Stock</span>
                            @elseif($mainProduct->stock < 5 && $mainProduct->stock > 0)
                                <span class="product-available">Only {{ $mainProduct->stock }} left in Stock</span>
                            @else
                                <span class="product-available">Out of Stock</span>
                            @endif
                        </div>

                        <form class="add-to-cart" method="get" action="{{ route('addToCart', ['id' => $mainProduct->id, 'amount' => 0]) }}">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" name="amount" value="1">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                           <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </form>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="/store/category/{{$mainProduct->Category->id}}">{{ $mainProduct->Category->name }}</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews ({{ $mainProduct->reviews->count() }})</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $mainProduct->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>{{ $mainProduct->rating() }}</span>
                                                <div class="rating-stars">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($mainProduct->rating() >= $i)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: {{ $mainProduct->ratingPercentage(5) }}%;"></div>
                                                    </div>
                                                    <span class="sum">{{ $mainProduct->reviews->where('rating', '=', '5')->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: {{ $mainProduct->ratingPercentage(4) }}%;"></div>
                                                    </div>
                                                    <span class="sum">{{ $mainProduct->reviews->where('rating', '=', '4')->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: {{ $mainProduct->ratingPercentage(3) }}%;"></div>
                                                    </div>
                                                    <span class="sum">{{ $mainProduct->reviews->where('rating', '=', '3')->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: {{ $mainProduct->ratingPercentage(2) }}%;"></div>
                                                    </div>
                                                    <span class="sum">{{ $mainProduct->reviews->where('rating', '=', '2')->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: {{ $mainProduct->ratingPercentage(1) }}%;"></div>
                                                    </div>
                                                    <span class="sum">{{ $mainProduct->reviews->where('rating', '=', '1')->count() }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach($mainProduct->reviews as $review)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{ $review->user->firstname }}</h5>
                                                        <p class="date">{{ date_format(date_create($review->updated_at), "d M Y - g\ui") }}</p>
                                                        <div class="review-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($review->rating >= $i)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$review->review}}</p>
                                                        @can('delete-reviews')
                                                            <form method="post" action="{{ route('deleteReview') }}">
                                                                {{ method_field('delete') }}
                                                                @csrf
                                                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                                                <input class="btn btn-link" type="submit" value="Delete review">
                                                            </form>
                                                        @elsecan('delete-own-reviews')
                                                            @if($review->user_id === $user->id)
                                                                <form method="post" action="{{ route('deleteOwnReview') }}">
                                                                    {{ method_field('delete') }}
                                                                    @csrf
                                                                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                                                                    <input class="btn btn-link" type="submit" value="Delete review">
                                                                </form>
                                                            @endif
                                                        @endcan
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            @can('leave-review')
                                            <form class="review-form" method="post" action="{{ route('leaveReview') }}">
                                                @csrf
                                                <p></p>
                                                <input class="input" value="{{ $user->fullname() }}" disabled>
                                                <input class="input" value="{{ $user->email }}" disabled>
                                                <input type="hidden" name="product_id" value="{{$mainProduct->id}}">
                                                <textarea class="input" name="review" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                            @endcan
                                            @cannot('leave-review')
                                                    You can not leave a review. @guest Are you <a href="{{ route('login') }}">logged in</a>?@endguest
                                            @endcan

                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
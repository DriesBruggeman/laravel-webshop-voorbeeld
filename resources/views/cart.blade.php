<div class="dropdown">
        <div class="cart-dropdown">
            @if(Session::has('cart') && count(Session::get('cart')->products) > 0)
            <div class="cart-list">
                @if(Session::has('cart'))
                    @foreach(Session::get('cart')->products as $product)
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product['product']->mainImage) }}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="{{ route('viewProduct', ['id' => $product['product']->id]) }}">{{ $product['product']->name }}</a></h3>
                                <h4 class="product-price"><span class="qty">{{ $product['qty'] }}x</span>
                                    @if($product['product']->discount == null || $product['product']->discount == 0)
                                        €{{ $product['product']->price }}
                                    @else
                                        €{{ $product['product']->price - $product['product']->price/100*$product['product']->discount}} <del class="product-old-price">€{{$product['product']->price}}</del>
                                    @endif
                                </h4>
                            </div>
                            <form method="get" action="{{ route('removeFromCart', ['id'=>$product['product']->id, 'amount' => $product['qty']]) }}"><button class="delete"><i class="fa fa-close"></i></button></form>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="cart-summary">
                <small>{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }} Item(s) selected</small>
                <h5>SUBTOTAL: €{{ Session::has('cart') ? Session::get('cart')->totalPrice : 0 }}</h5>
            </div>
            <div class="cart-btns">
                <a href="{{ route('viewCart') }}">View Cart</a>
                <a href="{{ route('checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            @else
                Cart is empty.
            @endif
        </div>

    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Your Cart</span>
        <div class="qty">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</div>
    </a>
</div>

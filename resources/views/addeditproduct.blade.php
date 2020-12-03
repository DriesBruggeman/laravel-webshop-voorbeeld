@extends('master')
@section('pageTitle')
    {{ $mode . ' product'}}
    @endsection
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <form class="container" method="post" action="@if($mode === 'Edit') {{ route('editProduct') }} @else {{ route('createProduct') }} @endif" enctype="multipart/form-data">
            @if($mode === 'Edit')
                {{ method_field('patch') }}
            @endif
                <input type="hidden" name="productId" value="{{ old('productId', $product->id) }}">
            @csrf
            <!-- row -->
            <div class="row">
                @include('errors')
                <div class="col">
                    <!-- Billing Details -->
                    <div class="product-information">
                        <div class="section-title">
                            <h3 class="title">Product information</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="productName" placeholder="Product name" value="{{ old('productName', $product->name) }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="refNumber" placeholder="Reference number" value="{{ old('refNumber', $product->refNumber) }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="brand" placeholder="Product Brand" value="{{ old('brand', $product->brand) }}">
                        </div>
                        <div class="form-group">
                            <textarea class="input" name="productDescription" placeholder="Product description">{{ old('productDescription', $product->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <input class="input" type="number" name="stock" placeholder="Amount of stock" value="{{ old('stock', $product->stock) }}">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="price" placeholder="Price" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="form-group">
                            Discount
                            <label for="discount-yes">Yes:</label>
                            <input type="radio" id="discount-yes" name="discount" value="true" @if(old('discountAmount', $product->discount) > 0) checked="checked" @endif>
                            <label for="discount-no">No:</label>
                            <input type="radio" id="discount-no" name="discount" value="false" @if(old('discountAmount', $product->discount) === null || old('discountAmount', $product->discount) == 0) checked="checked" @endif>
                            <input class="input" type="text" name="discountAmount" placeholder="Discount amount %" value="{{ old('discountAmount', $product->discount) }}">
                        </div>
                        <div class="form-group">
                            <label for="deliverydate">Delivery from date:</label>
                            <input class="input" type="date" name="expectedDelivery" id="deliverydate" value="{{ old('expectedDelivery', $product->deliverableFrom) }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="input" name="category" id="category">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" @if(old('category_id', $product->category_id) === $cat->id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mainImage">Main product image:</label>
                            <input class="input" type="file" name="mainImage" id="mainImage">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="primary-btn order-submit" value="{{ $mode }} product">
                        </div>

                    </div>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </form>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/cart.css') }}">
@endpush


@section('content')

    <h2> Your Cart </h2>

    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession

    <div class="cart-products-container">
        @foreach ($cartItems as $cartItem)
            <div class="cart-product-card">
                <div class="cart-img-container">
                    <img src="{{ asset('storage/' . $cartItem->image) }}" alt="Product Image" style="width:200px">
                </div>
                
                <div class="cart-card-details">
                    <h4 class="cart-product-name">{{ $cartItem->name }}</h4>
                    <div class="cart-product-price"> {{ $cartItem->price }} EGP</div>
                    <div class="cart-product-size">Size: {{ $cartItem->size }}</div>
                    <div class="cart-product-quantity">quantity: {{ $cartItem->pivot->quantity }}</div>
                    <a href="{{ route('carts.remove' , $cartItem->id) }}" class="delete-cart" onclick="return confirm('are you Sure?')"> Delete item </a>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('carts.clear') }}" class="clear"
    onclick="return confirm('are you Sure?')"> Delete All Products </a>

    <h3 class="total"> Total Price : {{ $total }} EGP </h3>

@endsection
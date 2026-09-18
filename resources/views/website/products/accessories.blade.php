@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/accessories.css') }}">
@endpush


@section('content')

    <h2> Accessories's Collection </h2>

    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession

    <div class="accessories-products-container">
        @foreach ($accessories as $accessory)
            <div class="accessory-product-card">
                <div class="accessory-img-container">
                    <img src="{{ asset('storage/' . $accessory->image) }}" alt="Product Image">
                </div>
                
                <div class="accessory-card-details">
                    <h3 class="accessory-product-name">{{ $accessory->name }}</h3>
                    <div class="accessory-product-price">{{ $accessory->price }} EGP</div>
                    <div class="accessory-product-size">Size: {{ $accessory->size }}</div>
                    <a href="{{ route('carts.add' , $accessory->id) }}" class="accessory-add-btn">Add To Cart</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
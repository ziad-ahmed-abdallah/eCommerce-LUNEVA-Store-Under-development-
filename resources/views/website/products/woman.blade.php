@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/woman.css')}}">
@endpush


@section('content')

    <h2> Women's Collection </h2>


    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession


    <div class="women-products-container">
        @foreach ($women as $woman)
            <div class="woman-product-card">
                <div class="woman-img-container">
                    <img src="{{ asset('storage/' . $woman->image) }}" alt="Product Image">
                </div>
                
                <div class="woman-card-details">
                    <h3 class="woman-product-name">{{ $woman->name }}</h3>
                    <div class="woman-product-price">{{ $woman->price }} EGP</div>
                    <div class="woman-product-size">Size: {{ $woman->size }}</div>
                    <a href="#" class="woman-add-btn">Add To Cart</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/men.css') }}">
@endpush

@section('content')


<h2> Men's Collection </h2>

    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession

<div class="products-container">
    @foreach ($men as $man)
        <div class="product-card">
            <div class="img-container">
                <img src="{{ asset('storage/' . $man->image) }}" alt="Product Image">
            </div>
        
            <div class="card-details">
                <h3 class="product-name">{{ $man->name }}</h3>
                <div class="product-price">{{ $man->price }} EGP</div>
                <div class="product-size">Size: {{ $man->size }}</div>
                <a href="{{ route('carts.add' , $man->id) }}" class="add-btn">Add To Cart</a>
            </div>
        </div>
    @endforeach
</div>

    <div class="next">
        {{ $men->links('pagination::bootstrap-4') }}
    </div>

@endsection
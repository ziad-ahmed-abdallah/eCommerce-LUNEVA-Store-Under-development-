@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/children.css')}}">
@endpush



@section('content')

    <h2> Children's Collection </h2>


    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession


    <div class="children-products-container">
        @foreach ($children as $child)
            <div class="child-product-card">
                <div class="child-img-container">
                    <img src="{{ asset('storage/' . $child->image) }}" alt="Product Image">
                </div>
                
                <div class="child-card-details">
                    <h3 class="child-product-name">{{ $child->name }}</h3>
                    <div class="child-product-price">{{ $child->price }} EGP</div>
                    <div class="child-product-size">Size: {{ $child->size }}</div>
                    <a href="{{ route('carts.add' , $child->id) }}" class="child-add-btn">Add To Cart</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection


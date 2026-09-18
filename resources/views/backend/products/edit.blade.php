@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/products/edit.css') }}">
@endpush

@section('content')

    <h1> Edit Product </h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error )
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    <form action=" {{ route('admin.products.update' , $product->id) }} " method="POST" enctype="multipart/form-data">
    
        @csrf            {{-- token --}}
        @method('PUT')   {{-- Update method --}}

        <img src="{{ asset('storage/' . $product->image) }}">

        <label> Product Name </label>
        <input type="text" name="name" value="{{ $product->name }}">

        <label>Product Price </label>
        <input type="text" name="price" value="{{ $product->price }}">

        <label> Product New image </label>
        <input type="file" name="image" value="{{ $product->image }}">

        <label> Product Size </label>
        <input type="text" name="size" value="{{ $product->size }}">

        <label> New Department </label>
        <select name="category_id">
            @foreach ($categories as $category  )
                <option value="{{ $category->id }}"> {{ $category->department }} </option>
            @endforeach
        </select>

        <input type="submit" value="Update">
    </form>
@endsection
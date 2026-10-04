@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/products/create.css') }}">
@endpush


@section('content')

    <h1> Create Product </h1>

    @if(session('success'))
    <p> {{ session('success') }} </p>
    @endif



    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf      {{-- token --}}
    
        <label> Product Name </label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p class="error"> {{ $message }} </p> @enderror
    
        <label>Product Price </label>
        <input type="text" name="price" value="{{ old('price') }}">
        @error('price') <p class="error"> {{ $message }} </p> @enderror
    
        <label> Product image </label>
        <input type="file" name="image">
        @error('image') <p class="error"> {{ $message }} </p> @enderror
    
        <label> Product Size </label>
        <input type="text" name="size" value="{{ old('size') }}">
        @error('size') <p class="error"> {{ $message }} </p> @enderror
    
        <label> Department </label>
        <select name="category_id">
            @foreach ($categories as $category  )
                <option value="{{ $category->id }}"> {{ $category->department }} </option>
            @endforeach
        </select>

        <input type="submit" value="Create">
    </form>
@endsection
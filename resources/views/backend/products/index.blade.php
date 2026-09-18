@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/products/index.css') }}">
@endpush


@section('content')

    @if(session('success'))
        <p> {{ session('success') }} </p>
    @endif

    <h1> All Products </h1>

    <form action="{{ route('admin.products.doSearch') }}" method="GET">
        @csrf
        <input class="search" type="search" name="search" placeholder="Search By Category"> 
        <input class="submit" type="submit" value="Search">
    </form>

    <table border="1">
        <thead>
            <th> id  </th>
            <th> Name  </th>
            <th> Price  </th>
            <th> image  </th>
            <th> Size  </th>
            <th> Category  </th>
            <th> Action </th>
        </thead>
    
    @foreach ($products as $product )
        <tbody>
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ $product->price }} </td>
                <td> <img src="{{ asset('storage/' . $product->image) }}"  width="60" height="60" style="object-fit:cover;"> </td>
                <td> {{ $product->size }} </td>
                <td> {{ $product->category->department }} </td>
                <td>
                    <a href="{{ route('admin.products.edit' , $product->id) }}" class="btn btn-primary"> Edit </a>
                    <form action="{{ route('admin.products.delete' , $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick=" return confirm('Are you Sure ?')">
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>

    <button class="btn btn-primary"> <a href="{{ route('admin.products.create') }}"> Add Products </a> </button>
@endsection

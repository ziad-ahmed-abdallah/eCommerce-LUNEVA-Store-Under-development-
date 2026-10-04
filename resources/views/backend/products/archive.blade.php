@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/products/archive.css') }}">
@endpush


@section('content')

    <h1> Products Archive </h1>

    @if(session('success'))
        <p> {{ session('success') }} </p>
    @endif



    <table border="1">
        <thead>
            <th> id  </th>
            <th> Name  </th>
            <th> Price  </th>
            <th> image  </th>
            <th> Size  </th>
            <th> Category_id  </th>
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
                <td> {{ $product->category_id }} </td>
                <td>
                    <a href="{{ route('admin.products.restore' , $product->id) }}" class="btn btn-primary" onclick=" return confirm('Are you Sure ?')"> Restore </a>
                
                    <form action="{{ route('admin.products.forceDelete' , $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Final Delete" class="btn btn-danger" onclick=" return confirm('Are you Sure ?')">
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>

    <button class="btn btn-primary"> <a href="{{ route('admin.products.index') }}"> Back </a> </button>
@endsection
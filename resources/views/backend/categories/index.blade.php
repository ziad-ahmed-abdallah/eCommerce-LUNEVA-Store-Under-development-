@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/categories/index.css') }}">
@endpush




@section('content')

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    <h1>Categories</h1>

<table border="1">
    <thead>
        <tr> 
            <th> Id </th>
            <th> Department </th>
            <th> Action </th>
        </tr>
    </thead>

    <tbody>
    @foreach ($categories as $category )
        <tr>
            <td> {{ $category->id }} </td>
            <td> {{ $category->department }} </td>
            <td>
                <a href="{{ route('admin.categories.edit' , $category->id)   }}" class="btn btn-primary"> Edit </a>   
                <form method="POST" action=" {{ route('admin.categories.delete' , $category->id) }} " class="d-inline-block">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger"  onclick=" return confirm('Are you Sure ?')" >
                </form>            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<button class="btn btn-primary"> <a href="{{ route('admin.categories.create') }}"> Add Category </a> </button>
@endsection
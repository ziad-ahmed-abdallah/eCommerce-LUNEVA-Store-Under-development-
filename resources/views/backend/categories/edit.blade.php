@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/categories/edit.css') }}">
@endpush

@section('content')

    <h1> Update category </h1>


    <form action="{{ route('admin.categories.update' , $category->id) }}" method="POST" >

    @csrf          <!-- IMPORTANT FOR SECURETY -->
    @method('PUT') <!-- IMPORTANT FOR SECURETY -->

        <label> New Name </label><br>
        <input type="text" value="{{ $category->department }}" name="department"><br>
        <button> Update </button>
    </form>

    <a class="show" href="{{ route('admin.categories.index') }}"> Show All </a>

@endsection
@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/categories/create.css') }}">
@endpush

@section('content')

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif


    <h1> Create category </h1>


    <form action="{{ route('admin.categories.store') }}" method="POST" >
    @csrf <!-- IMPORTANT FOR SECURETY -->
        <label> Name of Category </label><br>
        <input type="text" name="department"><br>
    
            @error('department')
                <span>{{ $message }}</span>
            @enderror
    
        <button> Create </button>
    </form>

    <a class="show" href="{{ route('admin.categories.index') }}"> Show All </a>

@endsection
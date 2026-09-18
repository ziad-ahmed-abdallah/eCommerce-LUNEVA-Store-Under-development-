@extends('website.layout.webLayout')



@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/register.css')}}">
@endpush


@section('content')

    <h1> Register </h1>

    <div class="register-wrapper">
        <form action="{{ route('handelRegister') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <label> Enter Full name </label>
            <input type="text" name="name">
            @error('name') <p class="error"> {{ $message }} </p> @enderror
    
            <label> Enter Email </label>
            <input type="email" name="email">
            @error('email') <p class="error"> {{ $message }} </p> @enderror
    
            <label>Enter Password </label>
            <input type="password" name="password">
            @error('password') <p class="error"> {{ $message }} </p> @enderror
    
            <label> Uplode Profile Picture</label>
            <input type="file" name="image">
            @error('image') <p class="error"> {{ $message }} </p> @enderror
    
            <label > Enter age </label>
            <input type="number" min="12" max="80" name="age">
            @error('age') <p class="error"> {{ $message }} </p> @enderror
    
            <label>Phone Number</label>
            <input type="text" name="phone">
    
            <button> Register </button>
        </form>
    </div>

@endsection
@extends('website.layout.webLayout')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/profile.css') }}">
@endpush


@section('content')

    <h1> Welcome {{ $user->name }}</h1>

    @session('success')
        <p class="success"> {{ $value }} </p>
    @endsession

    <div class="con">
        <form action="{{route('editProfile')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <img class="profilePic" src="{{ asset('storage/images/' . $user->image) }}">
        
            <label> Update Name </label> 
            <input type="text" name="name" value="{{ $user->name }}">
            @error('name') <p class="error"> {{ $message }} </p> @enderror
        
            <label> Update Email </label> 
            <input type="text" name="email" value="{{ $user->email }}">
            @error('email') <p class="error"> {{ $message }} </p> @enderror
        
            <label> Update Password </label>
            <input type="text" name="password">
            @error('password') <p class="error"> {{ $message }} </p> @enderror
        
            <label> Update Profile Picture </label>
            <input type="file" name="image">
            @error('image') <p class="error"> {{ $message }} </p> @enderror
        
            <label> Update Phone Number </label>
            <input type="text" name="phone" value="{{ $user->phone }}">
            @error('phone') <p class="error"> {{ $message }} </p> @enderror
        
            <button> Update </button>
        </form>
    </div>


@endsection
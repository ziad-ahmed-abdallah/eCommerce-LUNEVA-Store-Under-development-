@extends('website.layout.webLayout')


@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/login.css') }}">
@endpush


@section('content')



    <form action="{{ route('handelLogin')}}" method="POST">
    @csrf
        <h5> Log-in </h5>
    
        @if (session('wrong'))
            <div class="wrong"> {{ session('wrong') }} </div>
        @endif
    
        <input type="text" placeholder=" Email " name="email" value="{{ old('email') }}"> <br>
        @error('email') <div class="error"> {{ $message }} </div> @enderror
    
        <input type="password" placeholder=" password" name="password"><br>
        @error('password') <div class="error"> {{ $message }} </div> @enderror
    
        <button> Log-in </button>
    
        <p>  don't have an account ? go <a href="{{ route('register') }}"> Register </a> </p>
    </form>
@endsection
@extends('website.layout.webLayout')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/website/home.css') }}">
@endpush

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@section('content')
    <div class="wall">
        <img src="{{ asset('asset/images/biglogo.png') }}" alt="">
        <h1> Welcome to <span style="font-family:serif;" >LUNÉVA</span> store </h1>
        <p> Your one-stop destination for stylish clothing and accessories for men, women, and kids <br> combining quality, comfort, and the latest fashion trends </p>
    </div>
@endsection
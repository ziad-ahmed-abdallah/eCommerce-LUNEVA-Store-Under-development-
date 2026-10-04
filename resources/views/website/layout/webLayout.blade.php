<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <meta name="keywords" content="sell products"/>

    <meta name="description" content="Store Of Clothes Products"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS For each page by stack -->
    @stack('css')

    <title>LUNEVA</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-lg fixed-top" style="background-color:#C49A6C;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('/') }}" style="color: #4a3328; letter-spacing: 1px;">
            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" style="width: 50px">
        </a>

        <!-- Mobile Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('/') }}">Home</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('men') }}">Men</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('woman') }}">Women</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('children') }}">Children</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ route('accessories') }}">Accessories</a>
                </li>
            </ul>

            <!-- Right Side -->
            <div class=" d-flex gap-2 align-items-center">
            @guest
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light fw-semibold">
                    Register
                </a>
            
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light fw-semibold">
                    Login
                </a>
            @endguest
        
        
            @auth
            <div class="dropdown">
                <img src="{{ auth()->user()->image
                    ? asset('storage/images/' . auth()->user()->image)
                    : asset('storage/images/avatar.jpg') }}"
                    class="dropdown-toggle rounded-circle"
                    data-bs-toggle="dropdown"
                    width="40"
                    height="40"
                    style="cursor: pointer; object-fit: cover;">
                
                    <ul class="dropdown-menu"  style="background-color: #C49A6C">
                        <li>
                            @if(in_array(auth()->user()->role,['admin','superadmin']))
                                <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item" style="font-weight: 600">
                                    Dashboard
                                </a>
                            @endif
                        </li>
                    
                        <li><a class="dropdown-item" style="font-weight: 600"; 
                        href="{{ route('profile') }}"> Profile </a></li>
                    
                        <li><a class="dropdown-item" style="font-weight: 600"; 
                        href="{{ route('carts.index') }}"> My Cart </a></li>
                    
                        <li><a class="dropdown-item" style="font-weight: 600" 
                        href="{{ route('logout') }}"> Log out </a></li>
                    </ul>
                </div>
            @endauth

            </div>
        </div>
    </div>
</nav>




    @yield('content')




<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
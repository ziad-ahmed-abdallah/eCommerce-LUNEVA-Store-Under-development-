<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <meta name="keywords" content="sell products"/>

    <meta name="description" content="Store Of Clothes Products"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/style/backend/dashboard/index.css') }}">

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
                    
                        <li><a class="dropdown-item" style="font-weight: 600" 
                        href="{{ route('logout') }}"> Log out </a></li>
                    </ul>
                </div>
            @endauth
            </div>
        </div>
    </div>
</nav>



<div class="d-flex" style="padding-top: 70px;">
    <aside style="width: 250px; background: #2c3e50; min-height: 100vh;">
        <h5 class="first"> Categories </h5>
        <ul>
            <li><a href="{{ route('admin.categories.index') }}"> Show Categories </a></li>
            <li><a href="{{ route('admin.categories.create') }}"> Create Categories </a></li>
        </ul>

        <h5> Products </h5>
        <ul>
            <li><a href="{{ route('admin.products.index') }}"> Show Products </a></li>
            <li><a href="{{ route('admin.products.create') }}"> Create Products </a></li>
            <li><a href="{{ route('admin.products.archive') }}"> Archive </a></li>
        </ul>

        <h5> Users </h5>
        <ul>
            <li><a href="{{ route('admin.user.index') }}"> Show Users </a></li>
            <li><a href="{{ route('admin.user.archive') }}"> Archive </a></li>
        </ul>
    </aside>



    <div class="container" style="flex-grow: 1; padding: 20px;"> 
        @yield('content') 
    </div>
</div>









<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</html>










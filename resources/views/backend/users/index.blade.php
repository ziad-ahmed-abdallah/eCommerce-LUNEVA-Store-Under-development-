@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/users/index.css') }}">
@endpush


@section('content')

    <h1> All users </h1>

    <p> 
        @if (session('success'))
            {{ session('success') }}
        @endif
    </p>

    <p style="color: red"> 
        @if (session('error'))
            {{ session('error') }}
        @endif
    </p>


    <form class="search-box" action="{{ route('admin.user.doSearch') }}" method="GET">
        <input class="search" type="text" value="{{ request('search') }}" name="search" placeholder="Search by Name">
        <input class="submit" type="submit" value="Search">
    </form>



    <table border="1">
        <thead>
            <th> id </th>
            <th> Name </th>
            <th> Role </th>
            <th> Email </th>
            <th> image </th>
            <th> Age </th>
            <th> phone </th>
            <th> Action </th>
        </thead>
    
    @foreach ($users as $user )
        <tr>
            <td> {{ $user->id }} </td>
            <td> {{ $user->name }} </td>
            <td> {{ $user->role }} </td>
            <td> {{ $user->email }} </td>
        
        <td>
            <img class="avatar"
                src="{{ $user->image
                    ? asset('storage/images/' . $user->image)
                    : asset('storage/images/avatar.jpg') }}">
        </td>
        
            <td> {{ $user->age }} </td>
        
            <td> 
                @if(!$user->phone)
                    Null
                @endif
                {{ $user->phone }}
            </td>
        
            <td class="action">
                <form action="{{ route('admin.user.delete' , $user->id) }}" method="POST" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger" onclick=" return confirm('Are you Sure ?')">
                </form>
            </td>
        </tr>
    @endforeach
    </table>


    <div class="next">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>


@endsection
@extends('backend.dashboard.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/style/backend/users/index.css') }}">
@endpush


@section('content')

    <h1> Archive </h1>

    <p> 
        @if (session('success'))
            {{ session('success') }}
        @endif
    </p>

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
        
            <td>
                <a href="{{ route('admin.user.restore' , $user->id) }}" class="btn btn-primary"> Restore </a>
            
                <form action="{{ route('admin.user.forceDelete' , $user->id) }}" method="POST" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Final Delete" class="btn btn-danger" onclick=" return confirm('Are you Sure ?')">
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    
@endsection
@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">ReadEra</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('profile') }}">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=32" alt="Profile" class="rounded-circle me-2" style="width:32px;height:32px;">
                                <span>{{ Auth::user()->username }}</span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('books') }}">Books</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="padding:0;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Welcome to ReadEra Home</h1>
        <!-- Add more home page content here -->
    </div>
@endsection

<nav class="navbar">
    <div class="container navbar-content">

        <a href="/" class="logo" style="display: flex; align-items: center; gap: 8px;">
            <img src="/images/logo.png" alt="ReadEra Logo" style="height:32px; width:auto;">
            <span>ReadEra</span>
        </a>

        <ul class="nav-links">

            <li><a href="/">Home</a></li>
        
            <li><a href="/my-books">My Books</a></li>

            <li class="dropdown">
                <a class="dropdown-toggle">Genres</a>
                <ul class="dropdown-menu">
                    @foreach(App\Models\Genre::orderBy('name')->get() as $genre)
                        <li><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></li>
                    @endforeach
                </ul>
            </li>

        </ul>

        <div class="nav-user">
            @auth
                <span class="me-3">Welcome, {{ Auth::user()->username }}</span>
                <a href="{{ route('profile') }}" class="btn btn-outline me-2">Profile</a>
                <form action="/logout" method="POST" style="display:inline">@csrf
                    <button class="btn btn-dark-brown">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-dark-brown me-2">Login</a>
                <a href="/register" class="btn btn-dark-brown">Register</a>
            @endauth
        </div>

    </div>
</nav>

@if(!in_array(Route::currentRouteName(), ['login', 'register', 'auth.register']))
<!-- Search Bar at Bottom of Navbar -->
<div class="navbar-search-container" style="width:100%;background:#fff8e7;border-top:1px solid #d6b86c;padding:12px 0;display:flex;justify-content:center;">
    <form action="/search" method="get" class="navbar-search-form" style="display:flex;max-width:400px;width:100%;gap:8px;">
        <input type="text" name="q" class="form-control" placeholder="Search books..." style="flex:1;border:1px solid #d6b86c;border-radius:4px;padding:8px;" required>
        <button type="submit" class="btn btn-primary" style="background:#3b2f2f;border:none;color:#fff8e7;padding:8px 18px;border-radius:4px;">Search</button>
    </form>
</div>
@endif



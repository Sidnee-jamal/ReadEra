<div class="admin-sidebar bg-dark p-3 text-white">

    <h3 class="text-center mb-4">Admin Panel</h3>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="/admin/dashboard" class="nav-link text-white">
                Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/books" class="nav-link text-white">
                Books
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/genres" class="nav-link text-white">
                Genres
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/users" class="nav-link text-white">
                Users
            </a>
        </li>
        <li class="nav-item mt-4">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="nav-link text-danger bg-transparent border-0">Logout</button>
            </form>
        </li>

    </ul>

</div>

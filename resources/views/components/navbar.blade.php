<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="/">ReadEra</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a href="/books/free" class="nav-link">Free Books</a></li>
            <li class="nav-item"><a href="/books/premium" class="nav-link">Premium Books</a></li>
        </ul>

        <form action="/search" method="GET" class="d-flex">
            <input name="q" class="form-control me-2" type="search" placeholder="Search books">
            <button class="btn btn-outline-light">Search</button>
        </form>
    </div>
</nav>

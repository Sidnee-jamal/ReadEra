<aside class="sidebar-genres">
    <h4 class="sidebar-title">Genres</h4>
    <ul class="sidebar-genre-list">
        @foreach(App\Models\Genre::orderBy('name')->get() as $genre)
            <li><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></li>
        @endforeach
    </ul>
</aside>

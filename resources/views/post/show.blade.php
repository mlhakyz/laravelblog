<h1>{{ $post->title }}</h1>
<p>
    Kategori:
    <a href="{{ route('categories.show', $post->category) }}">
        {{ $post->category->name }}
    </a>
</p>
<p>
    {{ $post->content }}
</p>
<p>
    <small>{{ $post->created_at->diffForHumans() }}</small>
</p>
<p>
    <a href="{{ route('posts.edit', $post) }}">Düzenle</a>
    <form method="POST" action="{{ route('posts.destroy', $post) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Sil</button>
    </form>
    <a href="{{ route('posts.index') }}">Geri Dön</a>
</p>
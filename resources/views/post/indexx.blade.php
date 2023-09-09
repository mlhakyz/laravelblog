<p>
    <a href="{{ route('posts.create') }}">Yeni Yazı Ekle</a>
</p>
<ul>
    @forelse ($posts as $post)
    <li>
        <a href="{{ route('posts.show', $post) }}">
            {{ $post->title }}
        </a>
    </li>
    @empty
    <li>
        Herhangi bir yazı bulunamadı
    </li>
    @endforelse
</ul>
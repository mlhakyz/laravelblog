<p>
    <a href="{{ route('categories.create') }}">Yeni Kategori Ekle</a>
</p>
<br>
<form method="GET">
    <select name="order">
        <option value="asc">A-Z</option>
        <option @if($order === 'desc') selected @endif value="desc">Z-A</option>
    </select>
    <button type="submit">Sırala</button>
</form>
<ul>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>
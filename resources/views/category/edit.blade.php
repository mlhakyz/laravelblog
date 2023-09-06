@if ($errors->any())
    <p>Bir hata gerçekleşti.</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')
    <label for="inpName">Başlık</label>
    <br>
    <input type="text" value="{{ $errors->any() ? old('name') : $category->name }}" name="name" id="inpName" />
    <br>
    <button type="submit">Güncelle</button>
    <a href="{{ route('categories.show', $category) }}">Geri Dön</a>
</form>
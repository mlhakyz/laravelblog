@if ($errors->any())
    <p>Bir hata gerçekleşti.</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label for="inpName">İsim</label>
    <br>
    <input type="text" value="{{ old('name') }}" name="name" id="inpName" />
    <br>
    <button type="submit">Ekle</button>
    <a href="{{ route('categories.index') }}">Geri Dön</a>
</form>
@if ($errors->any())
    <p>Bir hata gerçekleşti.</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('posts.store') }} " enctype="multipart/form-data">
    @csrf
    <label for="slcCategory">Kategori</label>
    <br>
    <select name="category_id" id="slcCategory">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="inpEditor">Editor</label>
    <br>
    <input type="text" value="{{ old('editor') }}" name="editor" id="inpEditor" />
    <br>
    <label for="inpTitle">Başlık</label>
    <br>
    <input type="text" value="{{ old('title') }}" name="title" id="inpTitle" />
    <br>
    <label for="inpContent">İçerik</label>
    <br>
    <textarea name="content" id="inpContent">{{ old('content') }}</textarea>
    <br>
    <br>
    <input type="file" name="image" id="inpFile" />
    <br>
    <br>
    <button type="submit">Ekle</button>
    <a href="{{ route('posts.index') }}">Geri Dön</a>
</form>

@if ($errors->any())
    <p>Bir hata gerçekleşti.</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('posts.update', $post) }} " enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="slcCategory">Kategori</label>
    <br>
    <select name="category_id" id="slcCategory">
        @foreach ($categories as $category)
            <option @if ($post->category_id == $category->id) selected @endif value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    <label for="inpEditor">Editor</label>
    <br>
    <input type="text" value="{{ $errors->any() ? old('editor') : $post->editor }}" name="editor" id="inpEditor" />
    <br>
    <label for="inpTitle">Başlık</label>
    <br>
    <input type="text" value="{{ $errors->any() ? old('title') : $post->title }}" name="title" id="inpTitle" />
    <br>
    <label for="inpContent">İçerik</label>
    <br>
    <textarea name="content" id="inpContent">{{ $errors->any() ? old('content') : $post->content }}</textarea>
    <br>
    <br>
    <input type="file" name="image" id="inpFile" />
    <br>
    <br>
    <button type="submit">Güncelle</button>
    <a href="{{ route('posts.show', $post) }}">Geri Dön</a>
</form>

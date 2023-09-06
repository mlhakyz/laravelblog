@if ($errors->any())
    <p>Bir hata gerçekleşti.</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('story.handle') }}">
    @csrf
    <label>Kahramanımızın İsmi</label>
    <input type="text" name="name" value="{{ old('name') }}" />
    <br>
    <label>Sevdiği İçecek</label>
    <select name="drink">
        <option value="ice">Ice Capiccino</option>
        <option value="mocha" selected>Mocha</option>
        <option value="tea">Çay</option>
        <option value="coffee">Filtre Kahve</option>
    </select>
    <br>
    <p>Hobi</p>
    <label for="hobbyMusic">
        <input type="radio" name="hobby" value="music" checked id="hobbyMusic" />
        Müzik
    </label>
    <br>
    <label>
        <input type="radio" name="hobby" value="art" />
        Resim
    </label>
    <br>
    <label>
        <input type="radio" name="hobby" value="video-games" />
        Video Games
    </label>
    <br>
    <br>
    <label>Hikayeye Ek</label>
    <textarea name="notes"></textarea>
    <br>
    <label>
        <input type="checkbox" name="accept" />
        Oluşacak olan hikayenin tüm sorumluluğunu alıyorum.
    </label>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <br>
    <button>GÖNDER</button>
</form>
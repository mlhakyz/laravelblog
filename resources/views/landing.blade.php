<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translations['welcome'] }}</title>
    <style>
        .language {
            text-decoration: none;
            background: #ececec;
            padding: 3px 6px;
        }
        .active {
            background: red;
            color: white;
        }
        @if (Cookie::has('color') && in_array(Cookie::get('color'), ['red', 'green', 'blue']))
        h1 {
            color: {{ Cookie::get('color') }};
        }
        @endif
    </style>
</head>
<body>
    @foreach($languages as $language)
        <a href="{{ route('landing', ['lang' => $language]) }}"
            @class([
                'language',
                'active' => $language == $lang,
            ])
        >
            {{ strtoupper($language) }}
        </a>
    @endforeach
    <br>
    <a href="{{ url('set-color', 'red') }}">Red</a>
    <a href="{{ url('set-color', 'green') }}">Green</a>
    <a href="{{ url('set-color', 'blue') }}">Blue</a>
    <hr>
    <h1>{{ $translations['welcome'] }}</h1>
    <p>{{ $translations['intro'] }}</p>
    <p>{{ $translations['headline'] }}</p>
    <p><small>{{ $translations['outro'] }}</small></p>
</body>
</html>
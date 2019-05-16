<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StemApp 2.0</title>
    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    @if( Str::contains(mix('css/app.css'), '8080') === false)
        {{-- Only include this file when not using hot reloading.
          -- Otherwise we would get duplicate styles :(
          --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif
    <link rel="manifest" href="/manifest.json">
</head>
<body>
<div id="app"></div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

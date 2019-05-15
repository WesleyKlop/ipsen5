<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StemApp 2.0 - Login</title>
    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    <script async defer src="{{ mix('js/admin.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
</head>
<body>

<form action="/admin/login" method="post">
    @csrf
    <input type="text" name="username" autocomplete="username"/>
    <input type="password" name="password" autocomplete="current-password"/>
    <button class="mdc-button">
        <span class="mdc-button__label">Button</span>
    </button>
    {{--<input type="submit"/>--}}
</form>
</body>
</html>

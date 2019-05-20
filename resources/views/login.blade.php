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

<div class="mdc-card logincard">
    <form action="/admin/login" method="post" class="flex-container">
        @csrf
        <div class="mdc-text-field username-mdc">
            <input type="text" name="username" autocomplete="username" class="mdc-text-field__input"/>
            <label class="mdc-floating-label inputlabel">Gebruikersnaam</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <div class="mdc-text-field password-mdc">
            <input type="password" name="password" autocomplete="current-password" class="mdc-text-field__input"/>
            <label class="mdc-floating-label inputlabel">Wachtwoord</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <button class="mdc-button">
            <span class="mdc-button__label">Button</span>
        </button>
        {{--<input type="submit"/>--}}
    </form>
</div>
</body>
</html>

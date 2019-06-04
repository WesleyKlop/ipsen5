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
    <script defer src="{{ mix('js/admin.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="content-wrapper">
        <img src="/images/logo_shadow_admin.png" class="logo">
        <div class="mdc-card">
            <form action="/admin/login" method="post" class="login-container">
                @csrf
                <div class="mdc-text-field textfield-username">
                    <input type="text" name="username" autocomplete="username" class="mdc-text-field__input"/>
                    <div class="mdc-line-ripple"></div>
                    <label class="mdc-floating-label">Gebruikersnaam</label>
                </div>

                <div class="mdc-text-field mdc-text-field--with-trailing-icon textfield-password">
                    <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">remove_red_eye</i>
                    <input type="password" name="password" id="pw-field" autocomplete="current-password" class="mdc-text-field__input"/>
                    <label class="mdc-floating-label">Wachtwoord</label>
                    <div class="mdc-line-ripple"></div>
                </div>

                <label class="mdc-typography--caption caption">Minimaal 8 karakters</label>

                <button class="mdc-button mdc-button--raised">
                    <span class="mdc-button__label">Inloggen</span>
                </button>

                <button class="mdc-button">
                    <span class="mdc-button__label">Registreren</span>
                </button>
                {{--<input type="submit"/>--}}
            </form>
        </div>
    </div>
</body>
</html>
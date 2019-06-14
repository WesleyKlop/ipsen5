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
</head>
<body>
<div class="login-wrapper">
    <img src="/images/logo_shadow_admin.png" class="login-logo" alt="logo">
    @section('content')
    @show
</div>
<script type="application/javascript">
    // hide / unhide password
    const pwField = document.querySelector('#pw-field')
    const toggleButton = document.querySelector('#pw-eye')

    const showPassword = () => pwField.type = 'text'
    const hidePassword = () => pwField.type = 'password'

    toggleButton.addEventListener('pointerdown', showPassword);
    ['pointerup', 'pointercancel', 'pointerleave'].forEach(eventType =>
        toggleButton.addEventListener(eventType, hidePassword),
    )
</script>
</body>
</html>

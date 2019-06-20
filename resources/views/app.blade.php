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
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">

    <meta name="european-survey" content="{{ $settings['european-survey']->value }}" />
    <meta name="country-survey" content="{{ $settings['country-survey']->value }}" />
</head>
<body>
<div id="app"></div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

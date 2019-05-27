<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StemApp 2.0 - manage survey</title>
    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ mix('css/manage-survey.css') }}" rel="stylesheet">
    <script defer src="{{ mix('js/survey.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div class="mdc-card">
    <ul class="mdc-list">
        <li class="mdc-list-item" tabindex="0">
            <span class="mdc-list-item__text">Single-line item</span>
        </li>
        <li class="mdc-list-item">
            <span class="mdc-list-item__text">Single-line item</span>
        </li>
        <li class="mdc-list-item">
            <span class="mdc-list-item__text">Single-line item</span>
        </li>
    </ul>
</div>
</body>
</html>

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
    <link href="{{ mix('css/ManageSurvey.css') }}" rel="stylesheet">
    <script defer src="{{ mix('js/admin.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div class="manage-survey-wrapper">
    <div class="mdc-card--outlined">
        <h2>Stellingen</h2>
        <div class="manage-survey-row">
            <p>survey stelling hier bla bla bal</p>
        </div>
        <div class="manage-survey-row">
            <p>survey stelling hier bla bla bal</p>
        </div>
        <div class="manage-survey-row">
            <p>survey stelling hier bla bla bal</p>
        </div>

        <div class="mdc-text-field mdc-text-field--fullwidth">
            <input class="mdc-text-field__input"
                   type="text"
                   placeholder="Nieuwe stelling"
                   aria-label="Full-Width Text Field">
            <div class="mdc-line-ripple"></div>
        </div>
    </div>
</div>

</body>
</html>

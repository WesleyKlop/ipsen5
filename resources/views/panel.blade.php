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
    <link href="{{ mix('css/panel.css') }}" rel="stylesheet">
    <script defer src="{{ mix('js/adminPanel.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class="mdc-drawer">
    <div class="mdc-drawer__header">
        <img src="/images/logo_background_admin_panel.svg"/>
        <img class="logo" src="/images/logo_shadow.png"/>
        <h3 class="mdc-drawer__title">Beheerder</h3>
        <h6 class="mdc-drawer__subtitle">beheerder@fzes.nl</h6>
        <button class="mdc-icon-button material-icons">arrow_drop_down</button>
    </div>
    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <a class="mdc-list-item mdc-list-item--activated" href="#" aria-current="page">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">history</i>
                <span class="mdc-list-item__text">Recente Peilingen</span>
            </a>
            <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">public</i>
                <span class="mdc-list-item__text">Europese Peiling</span>
            </a>
            <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">flag</i>
                <span class="mdc-list-item__text">Landelijke Peiling</span>
            </a>
            <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">how_to_vote</i>
                <span class="mdc-list-item__text">Lokale Peiling</span>
            </a>
            <a class="mdc-list-item" href="#">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">question_answer</i>
                <span class="mdc-list-item__text">Feedback Peiling</span>
            </a>
        </nav>
    </div>
</div>

<div class="right-side">
    <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <span class="mdc-top-app-bar__title">Europese Peiling</span>
                <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined search-field">
                    <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">search</i>
                    <input class="mdc-text-field__input">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                            <label class="mdc-floating-label">Zoek...</label>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                <div>
                    <a href="#" class="material-icons mdc-top-app-bar__navigation-icon">sort</a>
                    <a href="#" class="material-icons mdc-top-app-bar__navigation-icon">more_vert</a>
                </div>
            </section>
        </div>
    </header>

    <div class="page-content">
        <p>Text goes here!</p>
        {{--        @yield('main_content')--}}
    </div>
</div>
</body>
</html>

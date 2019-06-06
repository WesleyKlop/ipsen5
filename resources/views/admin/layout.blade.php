<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StemApp 2.0 - @yield('title')</title>
    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    <script defer src="{{ mix('js/admin.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class="mdc-drawer">
    <div class="mdc-drawer__header">
        <img class="logo" src="/images/logo_shadow.png" alt="StemApp"/>
        <div class="drawer-header__info">
            <span class="mdc-drawer__title">Beheerder</span>
            <span class="mdc-drawer__subtitle">beheerder@fzes.nl</span>
            <button class="mdc-icon-button material-icons">arrow_drop_down</button>
        </div>
    </div>
    <div class="mdc-drawer__content">
        <nav class="mdc-list" data-mdc-auto-init="MDCList">
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

<div class="content-frame">
    <header class="mdc-top-app-bar" data-mdc-auto-init="MDCTopAppBar">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <span class="mdc-top-app-bar__title">@yield('title')</span>
                <div style="flex: 1;"></div>
                <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined mdc-text-field--no-label search-field" data-mdc-auto-init="MDCTextField">
                    <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">search</i>
                    <input class="mdc-text-field__input" placeholder="Zoek Peiling...">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                <div style="flex: 1;"></div>
                <a href="#" class="material-icons mdc-top-app-bar__navigation-icon">sort</a>
                <a href="#" class="material-icons mdc-top-app-bar__navigation-icon">more_vert</a>
            </section>
        </div>
    </header>
    <div class="mdc-top-app-bar--fixed-adjust"></div>
    <div class="page-content">
        <div style="height: 16px;"></div>

        @yield('content')
    </div>
</div>
</body>
</html>

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
    <meta name="theme-color" content="#e5e5e5">
</head>
<body>
<div class="mdc-drawer">
    <a class="mdc-drawer__header" href="{{ action('RecentSurveyController@show') }}">
        <img class="logo" src="/images/logo_shadow.png" alt="StemApp" />
        <div class="drawer-header__info">
            <span class="mdc-drawer__title">{{ Auth::user()->isTeacher() ? 'Docent' : 'Beheerder' }}{{Auth::user()->isTeacher() && Auth::user()->isInTrial() ? ' - proef' : ''}}</span>
            <span class="mdc-drawer__subtitle">{{ Auth::user()->username }}</span>
            <button class="mdc-icon-button material-icons">arrow_drop_down
            </button>
        </div>
    </a>
    <div class="mdc-drawer__content mdc-list-group">
        <nav class="mdc-list" data-mdc-auto-init="MDCList">
            <a class="mdc-list-item {{ request()->is('admin') ? 'mdc-list-item--activated' : ''}}"
               href="{{ action('RecentSurveyController@show') }}" aria-current="page">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">history</i>
                <span class="mdc-list-item__text">Recente Peilingen</span>
            </a>

            @if( Auth::user()->isTeacher() && !Auth::user()->isInTrial())
                <a class="mdc-list-item {{ request()->is("admin/survey/" . $settings[Auth::user()->user_id]->value . "*") ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyController@showSurvey', [ 'survey' => $settings[Auth::user()->user_id]->value ]) }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">class</i>
                    <span class="mdc-list-item__text">{{ \App\Eloquent\Survey::find($settings[Auth::user()->user_id]->value)->name }}</span>
                </a>
            @endif

            @if( Auth::user()->type == "admin" )
                <a class="mdc-list-item {{ request()->is('admin/survey') ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyOverviewController@showManageSurvey') }}" aria-current="page">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">equalizer</i>
                    <span class="mdc-list-item__text">Alle Peilingen</span>
                </a>

                <a class="mdc-list-item {{ request()->is("admin/survey/" . $settings['european-survey']->value . "*") ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyController@showSurvey', [ 'survey' => $settings['european-survey']->value ]) }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">public</i>
                    <span class="mdc-list-item__text">EU Peiling</span>
                </a>

                <a class="mdc-list-item {{ request()->is("admin/survey/" . $settings['country-survey']->value . "*") ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyController@showSurvey', [ 'survey' => $settings['country-survey']->value ]) }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">flag</i>
                    <span class="mdc-list-item__text">2e kamer Peiling</span>
                </a>
                <a class="mdc-list-item {{ request()->is("admin/survey/" . $settings['trial-survey']->value . "*") ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyController@showSurvey', [ 'survey' => $settings['trial-survey']->value ]) }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">how_to_vote</i>
                    <span class="mdc-list-item__text">Proef Peiling</span>
                </a>
                <a class="mdc-list-item {{ request()->is("admin/survey/" . $settings['feedback-survey']->value . "*") ? 'mdc-list-item--activated' : ''}}"
                   href="{{ action('SurveyController@showSurvey', [ 'survey' => $settings['feedback-survey']->value ]) }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">feedback</i>
                    <span class="mdc-list-item__text">Feedback Peiling</span>
                </a>
            @endif
        </nav>
        <div style="flex: 1"></div>
        <hr class="mdc-list-divider">
        <nav class="mdc-list" data-mdc-auto-init="MDCList">
            <a class="mdc-list-item {{ request()->is("admin/settings") ? 'mdc-list-item--activated' : ''}}"
               href="{{ action('SettingsController@show') }}">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>
                <span class="mdc-list-item__text">Instellingen</span>
            </a>
            <a class="mdc-list-item" href="{{ action('AdminLoginController@logout') }}">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">lock</i>
                <span class="mdc-list-item__text">Uitloggen</span>
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
                    <label for="search-field" class="material-icons mdc-text-field__icon hide-button" tabindex="0">search</label>
                    <input class="mdc-text-field__input" placeholder="Zoek Peiling..." id="search-field">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                    <ul class="mdc-list search-results mdc-card" data-mdc-auto-init="MDCList"></ul>
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

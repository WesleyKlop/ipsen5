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
    <script defer src="{{ mix('js/ManageSurvey.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div class="manage-survey-wrapper">
    <div class="mdc-card--outlined">
        <h2>Peilingen</h2>
        @foreach($surveys as $survey)
            <div class="manage-survey-row">
                <a href="{{url()->current().'/'.$survey->id}}">{{$survey->name}}</a>
                <div class="mdc-menu-surface--anchor">
                    <i class="material-icons mdc-text-field__icon" id="more_vert" role="button" tabindex="0">more_vert</i>
                    <div class="mdc-menu mdc-menu-surface" id="demo-menu">
                        <ul class="mdc-list mdc-menu__selection-group" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="1">
                            <li class="mdc-list-item" role="menuitem">
                                <span class="mdc-list-item__graphic mdc-menu__selection-group-icon"></span>
                                <span class="mdc-list-item__text">Verwijderen</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        <br>
        <form method="POST" action="/admin/manage-survey">
            @csrf
            <div class="manage-survey-row">
                <div class="mdc-text-field  new-survey-input">
                        <input class="mdc-text-field__input" type="text" name="name">
                    <label for="my-input" class="mdc-floating-label">Nieuwe peiling</label>
                    <div class="mdc-line-ripple"></div>
                </div>
                <i class="material-icons mdc-text-field__icon add-survey-icon" id="add_circle" tabindex="0" role="button" hidden="false" type="submit"> add_circle</i>
            </div>
        </form>
        <p>TOTO set this in upper right corner of input field ->{{$surveys -> count()}} / 50</p>
        <div>

        </div>
    </div>
</div>
</body>
</html>

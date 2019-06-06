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
    <link href="{{ mix('css/Survey.css') }}" rel="stylesheet">
    <script defer src="{{ mix('js/Survey.js') }}"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<h1>DIT IS SURVEY {{$survey->name}}</h1>
{{--<h1>Survey id {{$survey->id}}</h1>--}}
<div class="propositions-card-wrapper">
    <div class="mdc-card--outlined">
        <h2>Stellingen</h2>
        @foreach($survey->propositions as $proposition)
            <div class="proposition-row">
                <p>{{$proposition->proposition}}</p>
                <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">more_vert</i>
            </div>
        @endforeach
        <div class="proposition-row">
            <div class="mdc-text-field  new-proposition-input">
                <input class="mdc-text-field__input"
                       type="text">
                <label for="my-input" class="mdc-floating-label">Nieuwe Stelling</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <i class="material-icons mdc-text-field__icon add-survey-icon" tabindex="0" role="button" >add_circle</i>
        </div>
    </div>
</div>

<div class="survey-person-card-wrapper">
    <div class="mdc-card--outlined">
        <h2>Kandidaten</h2>
        @foreach($survey->candidates as $candidate)
            <div class="person-row">
                <div class="person-text-box">
                    <p>{{$candidate->profile->first_name}} {{$candidate->profile->last_name}}</p>
                    <p class="sub-text">{{$candidate->profile}}</p>
                </div>
                <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">remove_circle</i>
            </div>
        @endforeach
        <div class="person-row">
            <div class="mdc-text-field  new-person-input">
                <input class="mdc-text-field__input"
                       type="text">
                <label for="my-input" class="mdc-floating-label">Nieuwe Kandidaat</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <i class="material-icons mdc-text-field__icon add-survey-icon" tabindex="0" role="button" >add_circle</i>
        </div>
    </div>
</div>

<div class="survey-person-card-wrapper">
    <div class="mdc-card--outlined">
        <h2>Docenten</h2>
{{--        @foreach($survey->teachers as $teacher)--}}
{{--            <div class="person-row">--}}
{{--                <div class="person-text-box">--}}
{{--                    <p>{{$teacher->profile->first_name}} {{$teacher->profile->last_name}}</p>--}}
{{--                    <p class="sub-text">{{$teacher->profile}}</p>--}}
{{--                </div>--}}
{{--                <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">more_vert</i>--}}
{{--            </div>--}}
{{--        @endforeach--}}
        <div class="person-row">
            <div class="mdc-text-field  new-teacher-input">
                <input class="mdc-text-field__input"
                       type="text">
                <label for="my-input" class="mdc-floating-label">Nieuwe Docent</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <i class="material-icons mdc-text-field__icon add-survey-icon" tabindex="0" role="button" >add_circle</i>
        </div>
    </div>
</div>
<hr>
</body>
</html>
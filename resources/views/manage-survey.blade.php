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
            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">more_vert</i>
        </div>
            <br>
        @endforeach
{{--        <br>--}}
        <div class="manage-survey-row">
            <div class="mdc-text-field  new-survey-input">
                <input class="mdc-text-field__input"
                       type="text">
                <label for="my-input" class="mdc-floating-label">Nieuwe peiling</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <i class="material-icons mdc-text-field__icon add-survey-icon" tabindex="0" role="button" >add_circle</i>
        </div>
            <p>{{$surveys -> count()}} / max number of surveys here</p>
    </div>
</div>
</body>
</html>

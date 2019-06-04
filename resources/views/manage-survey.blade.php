@extends('panel')
@section('content')
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
            <p>{{$survey->name}}
            <i class="material-icons mdc-text-field__icon">more_vert</i></p>
        </div>
        @endforeach
        <div class="mdc-text-field mdc-text-field--fullwidth mdc-text-field--with-trailing-icon new-survey-input">
            <i class="material-icons mdc-text-field__icon" tabindex="0">add_circle</i>
            <input class="mdc-text-field__input"
                   type="text"
                   placeholder="Nieuwe peiling">
            <div class="mdc-line-ripple"></div>
        </div>
            <p>{{$surveys -> count()}} / @verbatim{{$maxNumberOfSurveys}}@endverbatim</p>
    </div>
</div>
</body>
@endsection
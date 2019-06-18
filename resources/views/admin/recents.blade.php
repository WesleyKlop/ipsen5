@extends('admin.layout')

@section('title')
    Recente Peilingen
@endsection

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Beschikbaar</h2>
        <ul class="mdc-list mdc-list--non-interactive"
            data-mdc-auto-init="MDCList">
            @foreach($startableSurveys as $survey)
                <li class="mdc-list-item">
                    <span class="mdc-list-item__text">
                      {{ $survey->name }}
                    </span>
                    <div class="mdc-list-item__meta recent-survey__meta">
                        <a class="mdc-button recent-survey__action"
                           href="{{ action('RecentSurveyController@startSurvey', $survey) }}">
                            Start
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mdc-card">
        <h2 class="card__title">Actief</h2>
        <ul class="mdc-list mdc-list--two-line mdc-list--non-interactive"
            data-mdc-auto-init="MDCList">
            @foreach($activeSurveys as $surveyCode)
                <li class="mdc-list-item">
                    <span class="mdc-list-item__text">
                        <span
                            class="mdc-list-item__primary-text">{{ $surveyCode->survey->name }}</span>
                        <span class="mdc-list-item__secondary-text">
                            Gestart op {{ $surveyCode->started_at->format('d-m-Y h:i') }}
                            &middot;
                            {{ $surveyCode->timeLeft()->format('Nog %a dagen, %h uur en %i minuten') }}
                        </span>
                    </span>
                    <div class="mdc-list-item__meta recent-survey__meta">
                        <span class="recent-survey__user-info">
                            {{ $surveyCode->voters()->count() }} stemmers<br />
                            {{ $surveyCode->survey->candidates()->count() }} kandidaten
                        </span>
                        <span
                            class="recent-survey__code">{{ $surveyCode->code }}</span>
                        <svg class="recent-survey__pie"></svg>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mdc-card">
        <h2 class="card__title">Verlopen</h2>
        <ul class="mdc-list mdc-list--two-line mdc-list--non-interactive"
            data-mdc-auto-init="MDCList">
            @foreach($expiredSurveys as $surveyCode)
                <li class="mdc-list-item">
                    <span class="mdc-list-item__text">
                        <span
                            class="mdc-list-item__primary-text">{{ $surveyCode->survey->name }}</span>
                        <span
                            class="mdc-list-item__secondary-text">Gestart op {{ $surveyCode->started_at->format('d-m-Y h:i') }}</span>
                    </span>
                    <div class="mdc-list-item__meta recent-survey__meta">
                        <span class="recent-survey__user-info">
                            {{ $surveyCode->survey->voters()->count() }} stemmers<br />
                            {{ $surveyCode->survey->candidates()->count() }} kandidaten
                        </span>
                        <a class="mdc-button recent-survey__action" href="{{ action('SurveyResultsController@show', $surveyCode)  }}">
                            Resultaten
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

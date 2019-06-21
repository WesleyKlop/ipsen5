@extends('admin.layout')


@section('title')
    Beheer peilingen
@endsection

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Peilingen</h2>
        <ul class="mdc-list" data-mdc-auto-init="MDCList">
            @foreach( $surveys as $survey )
                @if(!$survey->isClassRepSurvey())
                <li class="mdc-list-item">
                    <a class="mdc-list-item__text " href="{{ url()->current().'/'.$survey->id }}" style="width: 100%;">{{ $survey->name }}</a>
                    <form method="POST" action="{{ action('SurveyOverviewController@deleteSurvey') }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="survey-id" value="{{ $survey->id }}">
                        <button class="material-icons mdc-list-item__meta mdc-icon-button" type="submit">
                            clear
                        </button>
                    </form>
                </li>
                @endif
            @endforeach
        </ul>
        <form method="POST" action="{{ action('SurveyOverviewController@createSurvey') }}" class="mdc-card__actions card__actions">
            @csrf
            <div class="input-row">
                <div class="mdc-text-field new-survey-input" data-mdc-auto-init="MDCTextField">
                    <input class="mdc-text-field__input" type="text" name="name" maxlength="50" required id="survey-name">
                    <label for="survey-name" class="mdc-floating-label">Nieuwe
                        peiling</label>
                    <div class="mdc-line-ripple"></div>
                </div>
                <div class="mdc-text-field-helper-line">
                    <div class="mdc-text-field-character-counter"></div>
                </div>
            </div>
            <div style="flex: 0 0 16px"></div>
            <button class="mdc-icon-button material-icons" type="submit">
                add_circle
            </button>
        </form>
    </div>
@endsection

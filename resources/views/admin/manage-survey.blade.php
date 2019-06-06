@extends('admin.layout')

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Peilingen</h2>
        <ul class="mdc-list" data-mdc-auto-init="MDCList">
            @foreach( $surveys as $survey )
                <li class="mdc-list-item">
                    <a class="mdc-list-item__text " href="{{ url()->current().'/'.$survey->id }}">{{ $survey->name }}</a>
                </li>
            @endforeach
        </ul>
        <form method="POST" action="{{ action('SurveyOverviewController@createSurvey') }}" class="mdc-card__actions card__actions">
            @csrf
            <div class="input-row">
                <div class="mdc-text-field new-survey-input" data-mdc-auto-init="MDCTextField">
                    <input class="mdc-text-field__input" type="text" name="name" maxlength="50" required id="survey-name">
                    <label for="survey-name" class="mdc-floating-label">Nieuwe peiling</label>
                    <div class="mdc-line-ripple"></div>
                </div>
                <div class="mdc-text-field-helper-line">
                    <div class="mdc-text-field-character-counter"></div>
                </div>
            </div>
            <div style="flex: 0 0 16px"></div>
            <button class="mdc-icon-button material-icons" type="submit">add_circle</button>
        </form>
    </div>
@endsection

@extends('admin.layout')

@section('title')
    {{ $survey->name }}
@endsection

@section('content')
    <div class="mdc-card">
        <h2 class="card__title">Stellingen</h2>
        @if(!$survey->isEuSurvey() && !$survey->isCountrySurvey())
            <ul class="mdc-list mdc-list--two-line mdc-list--non-interactive" data-mdc-auto-init="MDCList">
                <li class="mdc-list-item ">
                    <span for="basic-switch" style="padding-right: 10px;">europese en 2e kamer stellingen      </span>
                    <form action="{{ action("SurveyController@toggleGeneralSurvey",$survey) }}" method="POST">
                    @csrf
                        <div class="mdc-switch {{ true ? 'mdc-switch--checked' : '' }}" data-mdc-auto-init="MDCSwitch">
                            <div class="mdc-switch__track"></div>
                            <div class="mdc-switch__thumb-underlay">
                                <div class="mdc-switch__thumb" >
                                    <input type="checkbox" id="basic-switch"
                                           class="mdc-switch__native-control"
                                           role="switch"
                                           name="useGeneralSurvey" onchange="this.form.submit()"
                                            {{ $survey->useGeneral() ? 'checked' : '' }}/>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        @endif

        <ul class="mdc-list mdc-list--two-line mdc-list--non-interactive" data-mdc-auto-init="MDCList">
            @foreach($survey->propositions as $proposition)
                <li class="mdc-list-item ">
                    <span style="width: 100%;">{{$proposition->proposition}}</span>
                    <form method="POST" action="{{ action('SurveyController@deleteProposition', $survey->id) }}">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="hidden" name="proposition-id" value="{{$proposition->id}}">
                        <button class="material-icons mdc-list-item__meta mdc-icon-button" tabindex="-1" type="submit">
                            clear
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form method="POST" action="{{ action('SurveyController@addProposition', $survey->id) }}" class="mdc-card__actions card__actions">
            @csrf
            <div class="input-row">
                <div class="mdc-text-field new-proposition-input" data-mdc-auto-init="MDCTextField">
                    <input class="mdc-text-field__input" type="text" name="proposition" maxlength="250" id="proposition-name" autocomplete="off">
                    <label for="proposition-name" class="mdc-floating-label">Nieuwe
                        stelling</label>
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

    @if(!$survey->isEuSurvey() && !$survey->isCountrySurvey())
        <div class="mdc-card">
            <h2 class="card__title">Kandidaten</h2>
            <ul class="mdc-list mdc-list--two-line mdc-list--non-interactive" data-mdc-auto-init="MDCList">
                @foreach($survey->candidates as $candidate)
                    <li class="mdc-list-item">
                        <span class="mdc-list-item__text">
                            <span class="mdc-list-item__primary-text">
                                {{ $candidate->profile->first_name ?? 'niet ingevuld' }}
                                {{ $candidate->profile->last_name ?? 'niet ingevuld' }}  |
                                {{ $candidate->profile->email ?? 'niet ingevuld' }}
                            </span>
                            <span class="mdc-list-item__secondary-text">
                                {{ $candidate->profile->party ?? 'niet ingevuld' }}
                                {{ $candidate->profile->function ?? 'niet ingevuld' }} |
                                @if($candidate->answers->count() < $survey->propositions()->count())
                                    Niet alle stellingen zijn beantwoord
                                @else
                                    Alle stellingen zijn beantwoord
                                @endif
                            </span>
                        </span>
                        <span class="mdc-list-item__meta" style="display: inherit;">
                            @if($candidate->answers->count() < $survey->propositions()->count())
                                <form method="POST" action="{{ action('SurveyController@mailCandidate', $survey->id) }}">
                                    @csrf
                                    <input type="hidden" name="url" value="{{$candidate->url}}">
                                    <button class="material-icons mdc-icon-button" tabindex="-1" type="submit" style="color:black; display: flex; flex-direction: row">mail</button>
                                </form>

                            @endif
                            <form method="POST" action="{{ action('SurveyController@removeCandidate', $survey->id) }}">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="hidden" name="url" value="{{$candidate->url}}">
                                <input type="hidden" name="surveyId" value="{{$candidate->survey_id}}">
                                <button class="material-icons mdc-icon-button" tabindex="-1" type="submit"
                                        style="color:black">
                                    clear</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ action('SurveyController@addCandidate', $survey->id) }}" class="mdc-card__actions card__actions">
                @csrf
                <div class="input-row">
                    <div class="mdc-text-field new-candidate-input" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" type="text" name="email" id="email" autocomplete="off">
                        <input type="hidden" name="survey-id" value="{{$survey->id}}">
                        <label for="candidate-name" class="mdc-floating-label">Nieuwe
                            kandidaat (email)</label>
                        <div class="mdc-line-ripple"></div>
                    </div>
                </div>
                <div style="flex: 0 0 16px"></div>
                <button class="mdc-icon-button material-icons" type="submit">
                    add_circle
                </button>
            </form>
        </div>

        @if( ! Auth::user()->isTeacher() )
            <div class="mdc-card">
                <h2 class="card__title">Docenten</h2>
                <ul class="mdc-list mdc-list--non-interactive" data-mdc-auto-init="MDCList">
                    @foreach($survey->teachers as $teacher)
                        <li class="mdc-list-item">
                            <span class="mdc-list-item__text">
                                {{ $teacher->username }}
                            </span>
                            <form method="POST" action="{{ action('SurveyController@removeTeacher', $survey) }}" class="mdc-list-item__meta">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="userId" value="{{ $teacher->user_id }}">
                                <button class="material-icons mdc-icon-button" tabindex="-1" type="submit">
                                    clear
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
                <form method="post" action="{{ action('SurveyController@addTeacher', $survey->id) }}" class="mdc-card__actions card__actions">
                    @csrf
                    <div class="input-row">
                        <div class="mdc-text-field new-teacher-input" data-mdc-auto-init="MDCTextField">
                            <input class="mdc-text-field__input" type="text" name="teacher" id="teacher" autocomplete="off">
                            <input type="hidden" name="survey-id" value="{{$survey->id}}">
                            <label for="teacher-name" class="mdc-floating-label">Nieuwe
                                docent</label>
                            <div class="mdc-line-ripple"></div>
                        </div>
                    </div>
                    <div style="flex: 0 0 16px"></div>
                    <button class="mdc-icon-button material-icons" type="submit">
                        add_circle
                    </button>
                </form>
            </div>
        @endif
    @endif
@endsection
@extends('admin.layout')

@section('title')
    Settings
@endsection

@section('content')
    <div class="mdc-card settings-page">
        <h2 class="card__title">Instellingen</h2>
        <form class="card__content" action="{{ action('SettingsController@submit') }}" method="post">
            @csrf
            <p>Hieronder kunt u de peiling instellen die gebruikt zal worden
                voor nieuwe gebruikers.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="trial-select" required name="trial-survey">
                    <option disabled value="" {{ !isset($settings['trial-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['trial-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="trial-select">
                    Trial Peiling
                </label>
                <div class="mdc-line-ripple"></div>
            </div>

            <p>Hieronder kunt u de peiling instellen die gebruikt zal worden als
                europese peiling.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="european-select" required name="european-survey">
                    <option disabled value="" {{ !isset($settings['european-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['european-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="european-select">
                    Europese Peiling
                </label>
                <div class="mdc-line-ripple"></div>
            </div>

            <p>Hieronder kunt u de peiling instellen die gebruikt
                zal worden als landelijke peiling.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="country-select" required name="country-survey">
                    <option disabled value="" {{ !isset($settings['country-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['country-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="country-select">
                    Landelijke Peiling
                </label>
                <div class="mdc-line-ripple"></div>
            </div>

            <div style="flex: 0 0 16px"></div>

            <button class="mdc-button" type="submit">
                <span class="mdc-button__label">Opslaan</span>
            </button>
        </form>
    </div>
    <div class="mdc-card settings-page">
        <h2 class="card__title">Beveiliging</h2>
        <form class="card__content" action="{{ action('SettingsController@updatePassword') }}" method="post">
            @csrf
            <p>Hier kunt u uw wachtwoord aanpassen. Wanneer het wachtwoord
                aangepast is moet er opnieuw ingelogd worden.</p>
            <div class="mdc-text-field mdc-text-field--with-trailing-icon" data-mdc-auto-init="MDCTextField">
                <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">remove_red_eye</i>
                <label class="mdc-floating-label" for="pw-field">Wachtwoord</label>
                <input type="password" name="password" autocomplete="new-password" class="mdc-text-field__input" id="pw-field" required minlength="8" />
                <div class="mdc-line-ripple"></div>
            </div>
            <div class="mdc-text-field mdc-text-field--with-trailing-icon" data-mdc-auto-init="MDCTextField">
                <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">remove_red_eye</i>
                <label class="mdc-floating-label" for="pw-confirm-field">
                    Herhaal wachtwoord
                </label>
                <input type="password" name="password_confirmation" autocomplete="new-password" class="mdc-text-field__input" id="pw-confirm-field" required minlength="8" />
                <div class="mdc-line-ripple"></div>
            </div>
            <button class="mdc-button" type="submit">
                <span class="mdc-button__label">Opslaan</span>
            </button>
        </form>
    </div>
@endsection

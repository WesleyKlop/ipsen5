@extends('admin.layout')

@section('title')
    Settings
@endsection

@section('content')
    <div class="mdc-card settings-page">
        <h2 class="card__title">Instellingen</h2>
        <form class="card__content" action="{{ action('SettingsController@submit') }}" method="post">
            @csrf
            <p>Hieronder kunt u de peiling instellen die gebruikt zal worden voor nieuwe gebruikers.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="trial-select" required name="trial-survey">
                    <option disabled value="" {{ !isset($settings['trial-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['trial-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="trial-select">Trial Peiling</label>
                <div class="mdc-line-ripple"></div>
            </div>

            <p>Hieronder kunt u de peiling instellen die gebruikt zal worden als europese peiling.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="european-select" required name="european-survey">
                    <option disabled value="" {{ !isset($settings['european-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['european-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="european-select">Europese Peiling</label>
                <div class="mdc-line-ripple"></div>
            </div>

            <p>Hieronder kunt u de peiling instellen die gebruikt zal worden als landelijke peiling.</p>
            <div class="mdc-select" data-mdc-auto-init="MDCSelect">
                <i class="mdc-select__dropdown-icon"></i>
                <select class="mdc-select__native-control" id="country-select" required name="country-survey">
                    <option disabled value="" {{ !isset($settings['country-survey']->value) ? 'selected' : '' }}></option>
                    @foreach( $surveys as $survey )
                        <option value="{{ $survey->id }}"{{ $settings['country-survey']->value === $survey->id ? ' selected' : '' }}>{{ $survey->name }}</option>
                    @endforeach
                </select>
                <label class="mdc-floating-label" for="country-select">Landelijke Peiling</label>
                <div class="mdc-line-ripple"></div>
            </div>

            <div style="flex: 0 0 16px"></div>

            <button class="mdc-button" type="submit">
                <span class="mdc-button__label">Opslaan</span>
            </button>
        </form>
    </div>
@endsection

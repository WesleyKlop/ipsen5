@extends('auth.layout')

@section('content')
    <div class="mdc-card">
        <form action="{{ action('AdminLoginController@login') }}" method="post" class="login-container">
            @csrf
            <div class="mdc-text-field textfield-username">
                <label class="mdc-floating-label" for="email">Email</label>
                <input type="email" name="username" autocomplete="email" class="mdc-text-field__input" id="email" autofocus/>
                <div class="mdc-line-ripple"></div>
            </div>

            <div class="mdc-text-field mdc-text-field--with-trailing-icon textfield-password">
                <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="-1" role="button">remove_red_eye</i>
                <label class="mdc-floating-label" for="pw-field">Wachtwoord</label>
                <input type="password" name="password" autocomplete="current-password" class="mdc-text-field__input" id="pw-field"/>
                <div class="mdc-line-ripple"></div>
            </div>

            <label class="mdc-typography--caption caption">Minimaal 8 karakters</label>

            <button class="mdc-button mdc-button--raised" type="submit">
                <span class="mdc-button__label">Inloggen</span>
            </button>

            <a class="mdc-button" href="{{ action('AdminRegisterController@showRegistrationForm') }}">
                <span class="mdc-button__label">Registreren</span>
            </a>
        </form>
    </div>
@endsection

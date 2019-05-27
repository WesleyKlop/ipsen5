@extends('auth.layout')

@section('content')
    <div class="mdc-card">
        <form action="/admin/login" method="post" class="login-container">
            @csrf
            <div class="mdc-text-field textfield-username">
                <input type="text" name="email" autocomplete="email" class="mdc-text-field__input"/>
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">Email</label>
            </div>

            <div class="mdc-text-field mdc-text-field--with-trailing-icon textfield-password">
                <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="0" role="button">remove_red_eye</i>
                <input type="password" name="password" id="pw-field" autocomplete="current-password" class="mdc-text-field__input"/>
                <label class="mdc-floating-label">Wachtwoord</label>
                <div class="mdc-line-ripple"></div>
            </div>

            <label class="mdc-typography--caption caption">Minimaal 8 karakters</label>

            <button class="mdc-button mdc-button--raised">
                <span class="mdc-button__label">Inloggen</span>
            </button>

            <button class="mdc-button">
                <span class="mdc-button__label">Registreren</span>
            </button>
            {{--<input type="submit"/>--}}
        </form>
    </div>
@endsection

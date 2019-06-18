@extends('auth.layout')

@section('content')
    <div class="mdc-card">
        <form action="{{ action('AdminRegisterController@register') }}" method="post" class="login-container">
            @csrf

            @component('auth.emailInput')@endcomponent
            @component('auth.passwordInput')@endComponent

            <button class="mdc-button mdc-button--raised" type="submit">
                <span class="mdc-button__label">Registreren</span>
            </button>

            <a class="mdc-button mdc-button--outlined" href="{{ action('AdminLoginController@showLoginForm') }}">
                <span class="mdc-button__label">Inloggen</span>
            </a>

             <a style="text-align:center" href="{{ action('AdminPasswordController@forgotPassword') }}">
                <span>Wachtwoord vergeten?</span>
            </a>
        </form>
    </div>
@endsection

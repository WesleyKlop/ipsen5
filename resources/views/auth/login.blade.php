@extends('auth.layout')

@section('content')
    <div class="mdc-card">
        @include('auth.errors')
        <form action="{{ action('AdminLoginController@login') }}" method="post" class="login-container">
            @csrf

            @component('auth.emailInput')@endcomponent
            @component('auth.passwordInput')@endComponent

            <button class="mdc-button mdc-button--raised" type="submit">
                <span class="mdc-button__label">Inloggen</span>
            </button>

            <a class="mdc-button" href="{{ action('AdminRegisterController@showRegistrationForm') }}">
                <span class="mdc-button__label">Registreren</span>
            </a>
        </form>
    </div>
@endsection

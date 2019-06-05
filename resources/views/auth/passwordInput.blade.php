<div class="mdc-text-field mdc-text-field--with-trailing-icon textfield-password">
    <i class="material-icons mdc-text-field__icon hide-button" id="pw-eye" tabindex="-1" role="button">remove_red_eye</i>
    <label class="mdc-floating-label" for="pw-field">Wachtwoord</label>
    <input type="password" name="password" autocomplete="current-password" class="mdc-text-field__input" id="pw-field" required minlength="8"/>
    <div class="mdc-line-ripple"></div>
</div>
<div class="mdc-text-field-helper-line mdc-text-field-helper-text--validation-msg mdc-text-field-helper-text--persistent">
    @error('password')
    <div class="mdc-text-field-helper-text">{{ $message }}</div>
    @enderror
</div>

<div class="mdc-text-field textfield-username" data-mdc-auto-init="MDCTextField">
    <label class="mdc-floating-label" for="email">Email</label>
    <input type="email" name="username" autocomplete="email"
           class="mdc-text-field__input" id="email" autofocus required
           value="{{ old('username') }}" />
    <div class="mdc-line-ripple"></div>
</div>
<div class="mdc-text-field-helper-line mdc-text-field-helper-text--validation-msg mdc-text-field-helper-text--persistent">
    @error('username')
    <div class="mdc-text-field-helper-text">{{ $message }}</div>
    @enderror
</div>

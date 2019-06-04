import './admin/bootstrap'

// hide / unhide password
const pwField = document.querySelector('#pw-field')
const toggleButton = document.querySelector('#pw-eye')

const showPassword = () => pwField.type = 'text'
const hidePassword = () => pwField.type = 'password'

toggleButton.addEventListener('pointerdown', showPassword);
['pointerup', 'pointercancel', 'pointerleave'].forEach(eventType =>
    toggleButton.addEventListener(eventType, hidePassword),
)

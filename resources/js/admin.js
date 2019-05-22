import autoInit from '@material/auto-init'
import {MDCTextField} from "@material/textfield/component";

autoInit();

//Instantiate & initialize textfields so the animation works
const usernameField = new MDCTextField(document.querySelector('.textfield-username'));
const passwordField = new MDCTextField(document.querySelector('.textfield-password'));
usernameField.initialize();
passwordField.initialize();


//Eventlistener to hide/unhide the password
document.getElementById('pw-eye').addEventListener("mousedown", toggleHide);
document.getElementById('pw-eye').addEventListener("mouseup", toggleHide);

function toggleHide() {
    let element = document.getElementById('pw-field');
    if (element.type === "password") {
        element.type = "text";
    } else {
        element.type = "password";
    }
}
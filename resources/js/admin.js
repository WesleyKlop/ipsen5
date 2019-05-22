import autoInit from '@material/auto-init'
import {MDCTextField} from "@material/textfield/component";

autoInit();

//Instantiate textfields so the animation works
const Usernamefield = new MDCTextField(document.querySelector('.textfield-username'));
const Passwordfield = new MDCTextField(document.querySelector('.textfield-password'));

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
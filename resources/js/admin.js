import autoInit from '@material/auto-init'
import {MDCTextField} from "@material/textfield/component";

autoInit();

//Instantiate textfields so the animation works
const Usernamefield = new MDCTextField(document.querySelector('.mdc-username'));
const Passwordfield = new MDCTextField(document.querySelector('.mdc-password'));
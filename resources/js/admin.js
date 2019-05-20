import autoInit from '@material/auto-init'
import {MDCTextField} from "@material/textfield/component";

autoInit();

//Instantiate textfields so the animation works
const Usernamefield = new MDCTextField(document.querySelector('.username-mdc'));
const Passwordfield = new MDCTextField(document.querySelector('.password-mdc'));
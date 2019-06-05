import {MDCLineRipple} from '@material/line-ripple';
import {MDCTextField} from "@material/textfield/component";
import {MDCMenu} from "@material/menu";



const newSurveyInput = new MDCTextField(document.querySelector('.new-survey-input'))
const menu = new MDCMenu(document.querySelector('.mdc-menu'))

const toggleButton = document.getElementById('more_vert').addEventListener("click", onToggleButton)

newSurveyInput.initialize()
menu.open = false

function onToggleButton() {
    console.log(menu.open.valueOf().toString())
    if(menu.open) {
        // toggleButton.hidden = false
        menu.open = false
    } else {
        // toggleButton.hidden = true
        menu.open = true
    }
}

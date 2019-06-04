import {MDCLineRipple} from '@material/line-ripple';
import {MDCTextField} from "@material/textfield/component";


const maxNumberOfSurveys = 50;
const newSurveyInput = new MDCTextField(document.querySelector('.new-survey-input'))

newSurveyInput.initialize()
maxNumberOfSurveys.initialize()

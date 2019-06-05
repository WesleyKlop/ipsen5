import {MDCLineRipple} from '@material/line-ripple';
import {MDCTextField} from "@material/textfield/component";

const newPropositionInput = new MDCTextField(document.querySelector('.new-proposition-input'))
const newPersonInput = new MDCTextField(document.querySelector('.new-person-input'))
const newTeacherInput = new MDCTextField(document.querySelector('.new-teacher-input'))

newPropositionInput.initialize()
newPersonInput.initialize()
newTeacherInput.initialize()

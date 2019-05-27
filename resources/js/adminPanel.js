import autoInit from '@material/auto-init'
import {MDCTextField} from "@material/textfield/component";

autoInit();

const searchbar = new MDCTextField(document.querySelector('.search-field'));
searchbar.initialize();
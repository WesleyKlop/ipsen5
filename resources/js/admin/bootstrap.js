import mdcAutoInit from '@material/auto-init'
import { MDCTextField } from '@material/textfield/component'
import { MDCDrawer } from '@material/drawer/component'
import { MDCList } from '@material/list/component'
import { MDCTopAppBar } from '@material/top-app-bar/component'

mdcAutoInit.register('MDCTextField', MDCTextField)
mdcAutoInit.register('MDCDrawer', MDCDrawer)
mdcAutoInit.register('MDCList', MDCList)
mdcAutoInit.register('MDCTopAppBar', MDCTopAppBar)

mdcAutoInit()

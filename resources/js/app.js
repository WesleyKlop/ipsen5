/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import React from 'react'
import { render } from 'react-dom'
import App from './containers/App'

// Kick-start the page!
render(<App/>, document.getElementById('app'))

if ('hot' in module) {
    module.hot.accept()
}

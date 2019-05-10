/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap'
import React from 'react'
import { render } from 'react-dom'
import Example from './components/Example'

// Kick-start the page!
render(<Example rating={'geweldig'}/>, document.getElementById('app'))


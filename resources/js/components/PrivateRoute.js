import React from 'react'
import { Redirect, Route } from 'react-router-dom'
import Auth from '../Auth'

const PrivateRoute = ({ component: Component, ...rest }) => (
  <Route
    {...rest}
    render={props =>
      Auth.isAuthenticated() === true ? (
        <Component {...props} />
      ) : (
        <Redirect to="/" />
      )
    }
  />
)

export default PrivateRoute

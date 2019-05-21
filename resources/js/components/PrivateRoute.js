import React from "react";
import {Route} from "react-router-dom";
import Redirect from "react-router-dom/es/Redirect";
import Auth from "../Auth";


const PrivateRoute = ({component: Component, ...rest}) => (
    <Route {...rest} render={(props) => (
        Auth.isAuthenticated === true
            ? <Component {...props}/>
            : <Redirect to='/'/>
    )}/>
)

export default PrivateRoute

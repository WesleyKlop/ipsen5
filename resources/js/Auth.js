import jwtDecode from 'jwt-decode'

const Auth = {
    getJWT: () => sessionStorage.getItem('jwt'),
    isAuthenticated: () => Auth.getJWT() !== null,
    isAuthorized: type => jwtDecode(Auth.getJWT()).sub.type === type,
    authenticate: jwt => sessionStorage.setItem('jwt', jwt['jwt']),
    signout: () => sessionStorage.removeItem('jwt'),
}

export default Auth

const Auth = {
    getJWT: () => sessionStorage.getItem('jwt'),
    isAuthenticated: () => Auth.getJWT() !== null,
    authenticate: (jwt) => sessionStorage.setItem('jwt', jwt['jwt']),
    signout: () => sessionStorage.removeItem('jwt')
}

export default Auth

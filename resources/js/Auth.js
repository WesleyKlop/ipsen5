const Auth = {
    isAuthenticated: false,
    authenticate(jwt) {
        sessionStorage.setItem('jwt', jwt)
        this.isAuthenticated = true
    },
    signout() {
        sessionStorage.removeItem('jwt')
        this.isAuthenticated = false
    }
}

export default Auth

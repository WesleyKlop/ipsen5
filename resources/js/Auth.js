import { decode } from 'jsonwebtoken'

const Auth = {
  getJWT: () => sessionStorage.getItem('jwt'),
  isAuthenticated: () => decode(Auth.getJWT()) !== null,
  getRole: () => (Auth.getJWT() ? decode(Auth.getJWT()).sub.type : false),
  isAuthorized: type => Auth.getRole() === type,
  authenticate: jwt => sessionStorage.setItem('jwt', jwt['jwt']),
  signout: () => sessionStorage.removeItem('jwt'),
}

export default Auth

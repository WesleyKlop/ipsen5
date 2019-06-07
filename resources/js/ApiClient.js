import Auth from './Auth'

class ApiClient {
  static PREFIX = '/api'

  request(url, method = 'GET', body = null) {
    return fetch(`${ApiClient.PREFIX}/${url}`, {
      method,
      headers: {
        Accept: 'application/json',
        Authorization: `Bearer ${Auth.getJWT()}`,
      },
      body,
    }).then(res =>
      res.ok ? res.json() : res.json().then(res => Promise.reject(res)),
    )
  }
}

const apiClient = new ApiClient()

window.apiClient = apiClient

export default apiClient

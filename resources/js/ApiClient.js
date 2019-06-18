import Auth from './Auth'

class ApiClient {
  static PREFIX = '/api'

  request(url, method = 'GET', body = null) {
    const payload =
      typeof body === 'string' || body === null || body instanceof FormData
        ? body
        : JSON.stringify(body)
    return fetch(`${ApiClient.PREFIX}/${url}`, {
      method,
      headers: {
        Accept: 'application/json',
        Authorization: `Bearer ${Auth.getJWT()}`,
      },
      body: payload,
    }).then(res => {
      if (res.headers.get('content-type') === 'application/json')
        return res.ok ? res.json() : res.json().then(res => Promise.reject(res))
      else return Promise.resolve()
    })
  }
}

const apiClient = new ApiClient()

window.apiClient = apiClient

export default apiClient

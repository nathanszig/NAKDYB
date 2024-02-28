export default defineNuxtPlugin((app: any) => {
  const _call = (method: string, action: string, isTokenRequired: boolean, body: object = {}) => {
    // Set headers
    const customHeaders: object = {
      'Content-Type': 'application/ld+json',
      'Authorization': isTokenRequired ? app.$session.getToken() : undefined,
    }

    // Set requestOptions
    const requestOptions: object = {
      method: method,
      headers: customHeaders,
      body: method !== 'GET' ? JSON.stringify(body) : undefined
    }

    // Send request
    return new Promise((resolve, reject) => {
      fetch(`${useRuntimeConfig().public.API_ENDPOINT}/${action}`, requestOptions)
        .then(async response => {
          const data = await response.json()

          if (response.ok) {
            // ----------- Return result
            resolve(data)
          } else {
            // --------------------- Catch error
            reject({status: response.status})
          }
        })
        .catch(() => {
          reject({status: null})
        })
    })
  }

  return {
    provide: {
      api: {
        get: (action: string, isTokenRequired: boolean) => _call('GET', action, isTokenRequired),
        post: (action: string, isTokenRequired: boolean, body: object = {}) => _call('POST', action, isTokenRequired, body),
        patch: (action: string, isTokenRequired: boolean, body: object = {}) => _call('PATCH', action, isTokenRequired, body),
        put: (action: string, isTokenRequired: boolean, body: object = {}) => _call('PUT', action, isTokenRequired, body),
        delete: (action: string, isTokenRequired: boolean, body: object = {}) => _call('DELETE', action, isTokenRequired, body),        
      }
    }
  }
})

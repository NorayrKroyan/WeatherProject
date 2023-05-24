const axiosInstance = require('axios').create({
    baseURL: 'http://laravel-vue.loc/api/',
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
});

axiosInstance.interceptors.request.use(config => {
    let token = window.localStorage.token
    if (token)
        config.headers['Authorization'] = `Bearer ${token}`

    return config
});

export default axiosInstance

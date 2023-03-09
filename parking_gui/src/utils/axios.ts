import axios from "axios";
import {toast} from "vue3-toastify";

const axiosHttp = axios.create({
  baseURL: 'http://localhost:8000/api',
});

axiosHttp.interceptors.response.use(function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    if(response.status === 400) {
      toast.success(response.message);;
    }

    return response;
  }, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    if (error.response.data !== undefined && error.response.data.success === false) {
      let errors = [] as object;
      let message = error.response.data.message;
      for (let key in message) {
        let value = message[key];
        if (typeof value === "object") {
          value.forEach((error_message) => {
            errors.push(error_message);
          });
        } else if (typeof value === "string") {
          error.push(value);
        }
      }

      let errorMsg = errors.concat('\n');
      toast.error(errorMsg);
    }
    return Promise.reject(error);
  });

export default axiosHttp;

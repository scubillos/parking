import axios from "axios";
import {toast} from "vue3-toastify";

const axiosHttp = axios.create({
  baseURL: 'http://localhost:8000/api',
});

axiosHttp.interceptors.response.use(function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    if(response.status === 400) {
      toast.error(response.message);
    }

    return response;
  }, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    if (error.response.data !== undefined && error.response.data.success === false) {
      extractMessages(error.response.data.message);
    }
    return Promise.reject(error);
  });

const extractMessages = function (data : object) {
  let errors = [] as object;
  for (let key in data) {
    let value = data[key];
    if (typeof value === "object") {
      extractMessages(value);
    } else if (typeof value === "string") {
      toast.error(value);
    }
  }
  return errors;
}


export default axiosHttp;

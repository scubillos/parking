import axios from "axios";
//import {toast} from "vue3-toastify";

const axiosHttp = axios.create({
  baseURL: 'http://localhost:8000/api',
});

axiosHttp.interceptors.response.use(function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    if(response.status === 400) {
         alert(response.message);
    }

    return response;
  }, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    if (error.response.data !== undefined) {
      let errorMsg = error.response.data.plat_number[0];
      alert(errorMsg);
      //toast.error(errorMsg);
      return Promise.reject(errorMsg);
    }
    return Promise.reject(error);
  });

export default axiosHttp;

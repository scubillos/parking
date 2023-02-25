import axios from "axios";

const axiosHttp = axios.create({
  baseURL: 'http://localhost:8000/api',
});

export default axiosHttp;

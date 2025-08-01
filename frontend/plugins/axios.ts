import axios from "axios";

export default defineNuxtPlugin(() => {
  const api = axios.create({
    baseURL: "http://localhost:8000/api", // Replace with your actual API
  });

  return {
    provide: {
      axios: api,
    },
  };
});

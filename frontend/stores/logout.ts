import { defineStore } from "pinia";

export const useLogoutStore = defineStore("logout", {
  state: () => ({
    status: false,
  }),
  actions: {
    open() {
      this.status = true;
    },
    close() {
        this.status = false;
    }
  },
});

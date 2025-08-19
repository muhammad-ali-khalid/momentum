import { defineStore } from "pinia";

export const useDeleteStore = defineStore("delete", {
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

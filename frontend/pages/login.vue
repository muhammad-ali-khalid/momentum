<script setup lang="ts">
import { NuxtLink } from "#components";

const { $axios } = useNuxtApp();

const email = ref(null);
const password = ref(null);
let isAuthenticated = false;

async function processForm() {
  // const res = await $axios.post(
  //   "login",
  //   {
  //     email: email.value,
  //     password: password.value,
  //   },
  //   {
  //     headers: {
  //       Accept: "application/json",
  //     },
  //   }
  // );
  // console.log(res.data.token);
  // await navigateTo("/tasks");
}
</script>

<template>
  <div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
      <div
        class="hidden bg-cover lg:block lg:w-2/3"
        style="
          background-image: url('/img/photo-1616763355603-9755a640a287.jpeg');
        "
      >
        <div class="flex items-center h-full px-20 bg-opacity-40">
          <div>
            <h2 class="text-5xl font-black text-white">Momentum</h2>

            <p class="text-2xl max-w-xl mt-3 text-white font-bold">
              The Next Generation Productivity Web App
            </p>
          </div>
        </div>
      </div>

      <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
        <div class="flex-1">
          <div class="text-center">
            <div class="flex justify-center mx-auto">
              <img
                class="w-auto h-7 sm:h-8"
                src="https://merakiui.com/images/logo.svg"
                alt=""
              />
            </div>

            <p class="mt-3 text-gray-500 dark:text-gray-300">
              Sign in to access your account
            </p>
          </div>

          <div class="mt-8">
            <form @submit.prevent="processForm">
              <div>
                <label
                  for="email"
                  class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                  >Email Address</label
                >
                <input
                  v-model="email"
                  type="email"
                  name="email"
                  id="email"
                  placeholder="example@example.com"
                  class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div class="mt-6">
                <div class="flex justify-between mb-2">
                  <label
                    for="password"
                    class="text-sm text-gray-600 dark:text-gray-200"
                    >Password</label
                  >
                  <a
                    href="#"
                    class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline"
                    >Forgot password?</a
                  >
                </div>

                <input
                  v-model="password"
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Your Password"
                  class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
              </div>

              <div class="mt-6">
                <button
                  class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 hover:cursor-pointer focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                >
                  Sign in
                </button>
              </div>
            </form>

            <p class="mt-6 text-sm text-center text-gray-400">
              Don&#x27;t have an account yet?
              <NuxtLink
                to="/register"
                class="text-blue-500 focus:outline-none focus:underline hover:underline"
                >Sign Up</NuxtLink
              >
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

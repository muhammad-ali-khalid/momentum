<script setup lang="ts">
const {$axios} = useNuxtApp();

const email = ref(null);
const password = ref(null);

async function handleRegisterFunction(){
  const res = await $axios.post('/register', {
    email
  });
}

</script>
<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center min-h-screen">
      <div
        class="hidden bg-cover lg:block lg:w-2/5"
        style="
          background-image: url('/img/photo-1494621930069-4fd4b2e24a11.jpeg');
        "
      ></div>

      <div
        class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5"
      >
        <div class="w-full">
          <h1
            class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white"
          >
            Get your free account now.
          </h1>

          <p class="mt-4 text-gray-500 dark:text-gray-400">
            Let’s get you all set up so you can verify your personal account and
            begin setting up your profile.
          </p>

          <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                >Name</label
              >
              <input
                type="text"
                placeholder="John Snow"
                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
              />
            </div>

            <div>
              <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                >Email address</label
              >
              <input
                type="email"
                placeholder="johnsnow@example.com"
                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
              />
            </div>

            <div>
              <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                >Password</label
              >
              <input
                type="password"
                placeholder="Enter your password"
                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
              />
            </div>

            <div>
              <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                >Confirm password</label
              >
              <input
                type="password"
                placeholder="Enter your password"
                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
              />
            </div>

            <button
              class="w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50"
            >
              <span>Sign Up </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

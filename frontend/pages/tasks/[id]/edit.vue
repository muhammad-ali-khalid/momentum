<script setup lang="ts">
const { $axios } = useNuxtApp();
const route = useRoute();

const title = ref(null);
const description = ref(null);
const dueDate = ref(null);
const time = ref(null);

onBeforeMount(async () => {
  const res = await $axios.get(`/tasks/${route.params.id}`, {
    headers: {
      Authorization: `Bearer ${localStorage.getItem("token")}`,
    },
  });

  const task = res.data;
  const arr = task.due_date.split(" ");

  title.value = task.title;
  description.value = task.description;
  dueDate.value = arr[0];
  time.value = arr[1].slice(0, 5);
});

async function processForm() {
  const res = await $axios.put(
    `/tasks/${route.params.id}`,
    {
      title: title.value,
      description: description.value,
      due_date: `${dueDate.value} ${time.value}`,
    },
    {
      headers: {
        Authorization: `Bearer ${localStorage.getItem("token")}`,
      },
    }
  );
  await navigateTo("/tasks");
}
</script>

<template>
  <div class="h-screen dark:bg-gray-800">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md dark:bg-gray-800">
      <form @submit.prevent="processForm">
        <div class="flex flex-col gap-6 mt-4">
          <div>
            <label class="text-gray-700 dark:text-gray-200" for="title"
              >Title</label
            >
            <input
              v-model="title"
              id="title"
              type="text"
              class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
            />
          </div>

          <div>
            <label class="text-gray-700 dark:text-gray-200" for="description"
              >Description</label
            >
            <input
              v-model="description"
              id="description"
              type="text"
              class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
            />
          </div>
          <div>
            <label class="text-gray-700 dark:text-gray-200" for="dueDate"
              >Due Date</label
            >
            <input
              v-model="dueDate"
              id="dueDate"
              type="date"
              class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
            />
          </div>
          <div>
            <label class="text-gray-700 dark:text-gray-200" for="dueDate"
              >Time</label
            >
            <input
              v-model="time"
              id="time"
              type="time"
              class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
            />
          </div>
        </div>

        <div class="flex justify-end gap-4 mt-6">
          <button
            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 hover:cursor-pointer focus:outline-none focus:bg-gray-600"
          >
            Update
          </button>
          <NuxtLink
            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 hover:cursor-pointer focus:outline-none focus:bg-gray-600"
            to="/tasks"
          >
            Cancel
          </NuxtLink>
        </div>
      </form>
    </section>
  </div>
</template>

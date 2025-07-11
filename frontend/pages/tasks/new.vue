<template>
  <div class="h-screen dark:bg-gray-800">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md dark:bg-gray-800">
      <form method="post">
        <div class="flex flex-col gap-6 mt-4">
          <div>
            <label class="text-gray-700 dark:text-gray-200" for="title"
              >Title</label
            >
            <input
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
              id="dueDate"
              type="date"
              class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
            />
          </div>
        </div>

        <div class="flex justify-end gap-4 mt-6">
          <button
            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 hover:cursor-pointer focus:outline-none focus:bg-gray-600"
          >
            Save
          </button>
          <button
            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 hover:cursor-pointer focus:outline-none focus:bg-gray-600"
          >
            Cancel
          </button>
        </div>
      </form>
    </section>
  </div>
</template>

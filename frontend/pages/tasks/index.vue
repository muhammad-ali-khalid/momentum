<script setup lang="ts">
type Task = {
  id: Number;
  title: string;
  description: string;
  dueDate: Date;
  status: "active" | "completed" | "missed";
};

const tasks: Array<Task> = [
  {
    id: 1,
    title: "Buy Grocery",
    description: "Buy milk and eggs",
    dueDate: new Date(2025, 8, 10),
    status: "active",
  },
  {
    id: 2,
    title: "Read book",
    description: "Finish Deep Work",
    dueDate: new Date(2025, 9, 23),
    status: "active",
  },
  {
    id: 3,
    title: "Buy Grocery",
    description: "Buy milk and eggs",
    dueDate: new Date(2025, 8, 10),
    status: "active",
  },
  {
    id: 4,
    title: "Read book",
    description: "Finish Deep Work",
    dueDate: new Date(2025, 9, 23),
    status: "active",
  },
];
</script>

<template>
  <div class="h-screen w-screen dark:bg-gray-900">
    <div class="container px-10 mx-auto">
      <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div
            class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
          >
            <div class="my-4">
              <p class="text-2xl dark:text-white m-2">All Tasks</p>
              <div class="flex gap-2">
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                  <div
                    class="inline px-3 py-1 text-sm font-normal rounded-full text-blue-700 gap-x-2 bg-blue-100/60 dark:text-blue-500 dark:bg-gray-800"
                  >
                    All
                  </div>
                </td>
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                  <div
                    class="inline px-3 py-1 text-sm font-normal rounded-full text-gray-700 gap-x-2 bg-gray-100/60 dark:text-gray-200 dark:bg-gray-800"
                  >
                    Active
                  </div>
                </td>
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                  <div
                    class="inline px-3 py-1 text-sm font-normal rounded-full text-gray-700 gap-x-2 bg-gray-100/60 dark:text-gray-200 dark:bg-gray-800"
                  >
                    Completed
                  </div>
                </td>
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                  <div
                    class="inline px-3 py-1 text-sm font-normal rounded-full text-gray-700 gap-x-2 bg-gray-100/60 dark:text-gray-200 dark:bg-gray-800"
                  >
                    Missed
                  </div>
                </td>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="container px-10 mx-auto">
      <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div
            class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
          >
            <div
              class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg"
            >
              <table
                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
              >
                <thead class="bg-gray-50 dark:bg-gray-800">
                  <tr>
                    <th
                      scope="col"
                      class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      <button
                        class="flex items-center gap-x-3 focus:outline-none"
                      >
                        <span>Title</span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Description
                    </th>
                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Due Date
                    </th>
                    <th
                      scope="col"
                      class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Status
                    </th>
                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody
                  class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
                >
                  <MoleculeTheTask
                    v-for="task in tasks"
                    :id="task.id"
                    :task="task"
                  />
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="flex justify-center mt-7">
      <NuxtLink
        to="/tasks/new"
        class="px-10 py-2 text-md text-gray-700 transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 hover:cursor-pointer dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
      >
        New Task
      </NuxtLink>
    </div>
  </div>
</template>

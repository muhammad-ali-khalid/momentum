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
    <section class="container px-4 mx-auto">
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

    <div class="flex justify-center mt-5">
      <NuxtLink
        class="px-10 py-2 text-md text-gray-700 transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 hover:cursor-pointer dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
        to="/login"     
        >
        New Task
      </NuxtLink>
    </div>
  </div>
</template>

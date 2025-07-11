<script setup lang="ts">
type Task = {
  id: number;
  title: string;
  description: string;
  dueDate: Date;
  status: "active" | "completed" | "missed";
};

const filters: Array<string> = ["All", "Active", "Completed", "Missed"];

const activeFilter = ref(0);

const activeFilterClass =
  "text-sm font-medium whitespace-nowrap inline px-3 py-1 text-sm font-normal rounded-full text-blue-700 gap-x-2 bg-blue-100/60 dark:text-blue-500 dark:bg-gray-800 hover:cursor-pointer";

const nonActiveFilterClass =
  "text-sm font-medium whitespace-nowrap inline px-3 py-1 text-sm font-normal rounded-full text-gray-700 gap-x-2 bg-gray-100/60 dark:text-gray-200 dark:bg-gray-800 hover:cursor-pointer";

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
  <div class="h-screen dark:bg-gray-900">
    <div class="@container">
      <div class="px-6 @sm:flex @sm:flex-col @sm:items-center">
        <div class="text-3xl dark:text-white pt-4">All Tasks</div>
        <div class="flex gap-2 py-2 overflow-x-auto">
          <button
            :class="
              activeFilter == i ? activeFilterClass : nonActiveFilterClass
            "
            v-for="(filter, i) in filters"
            :id="filter"
            @click="activeFilter = i"
          >
            {{ filter }}
          </button>
        </div>
      </div>
    </div>

    <section class="container px-10 mx-auto pt-2">
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
                      <span>Title</span>
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

    <div class="flex justify-center mt-4">
      <NuxtLink
        to="/tasks/new"
        class="px-10 py-2 text-md text-white bg-blue-500 border rounded-md border-blue-500 hover:bg-blue-400 hover:cursor-pointer"
      >
        New Task
      </NuxtLink>
    </div>
  </div>
</template>

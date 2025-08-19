<script setup lang="ts">
const { $axios } = useNuxtApp();

const deleteStore = useDeleteStore();

const logoutStore = useLogoutStore();

type Task = {
  id: number;
  user_id: number;
  title: string;
  description: string;
  due_date: string;
  status: "active" | "completed" | "missed";
  created_at: string;
  updated_at: string;
};

const taskHeading = ref("All");

const tasks = ref(Array<Task>);

const taskID = ref(null);

onBeforeMount(async () => {
  let token = localStorage.getItem("token");
  const res = await $axios.get("/tasks", {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });
  tasks.value = res.data;
});

async function handleFilterOperation(index: number) {
  const token = localStorage.getItem("token");
  let status: string | null = null;

  switch (index) {
    case 1:
      status = "active";
      break;
    case 2:
      status = "completed";
      break;
    case 3:
      status = "missed";
      break;
  }

  const res = await $axios.get("/tasks", {
    headers: {
      Authorization: `Bearer ${token}`,
    },
    params: status ? { status } : {},
  });

  tasks.value = res.data;
}

const filters: Array<string> = ["All", "Active", "Completed", "Missed"];

const activeFilter = ref(0);

const activeFilterClass =
  "text-sm font-medium whitespace-nowrap inline px-3 py-1 text-sm font-normal rounded-full text-blue-700 gap-x-2 bg-blue-100/60 dark:text-blue-500 dark:bg-gray-800 hover:cursor-pointer";

const nonActiveFilterClass =
  "text-sm font-medium whitespace-nowrap inline px-3 py-1 text-sm font-normal rounded-full text-gray-700 gap-x-2 bg-gray-100/60 dark:text-gray-200 dark:bg-gray-800 hover:cursor-pointer";
</script>

<template>
  <div class="h-screen dark:bg-gray-900">
    <div class="flex justify-end pt-5 pr-5">
      <button
        @click="logoutStore.open()"
        class="text-blue-500 underline cursor-pointer"
      >
        Logout
      </button>
    </div>
    <div class="@container">
      <div class="px-6 @sm:flex @sm:flex-col @sm:items-center">
        <div class="text-3xl pt-5 dark:text-white">{{ taskHeading }} Tasks</div>
        <div class="flex gap-2 py-2 overflow-x-auto">
          <button
            :class="
              activeFilter == i ? activeFilterClass : nonActiveFilterClass
            "
            v-for="(filter, i) in filters"
            :id="filter"
            @click="
              activeFilter = i;
              taskHeading = filter;
              handleFilterOperation(i);
            "
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
                  <tr v-for="(task, i) in tasks" :id="task.id">
                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                      <div>
                        <h2 class="font-medium text-gray-800 dark:text-white">
                          {{ task.title }}
                        </h2>
                      </div>
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                      <div>
                        <h4 class="text-gray-700 dark:text-gray-200">
                          {{ task.description }}
                        </h4>
                      </div>
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                      <div>
                        <h4 class="text-gray-700 dark:text-gray-200">
                          {{ task.due_date }}
                        </h4>
                      </div>
                    </td>
                    <td
                      class="px-12 py-4 text-sm font-medium whitespace-nowrap"
                    >
                      <div
                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800"
                      >
                        {{ task.status }}
                      </div>
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                      <div class="flex flex-col gap-2">
                        <NuxtLink
                          :to="`/tasks/${task.id}/edit`"
                          class="text-blue-500 underline"
                          >Edit</NuxtLink
                        >
                        <NuxtLink
                          @click="
                            $route.params.id = task.id;
                            deleteStore.open();
                          "
                          class="text-blue-500 underline cursor-pointer"
                          >Delete</NuxtLink
                        >
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="flex justify-center mt-10">
      <NuxtLink
        to="/tasks/new"
        class="px-10 py-2 text-md text-white bg-blue-500 border rounded-md border-blue-500 hover:bg-blue-400 hover:cursor-pointer"
      >
        New Task
      </NuxtLink>
    </div>
  </div>
  <MoleculeLogoutDialog />
  <MoleculeDeleteDialog />
</template>

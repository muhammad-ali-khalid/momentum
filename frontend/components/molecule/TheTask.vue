<script setup lang="ts">
type Task = {
  id: Number;
  title: string;
  description: string;
  dueDate: Date;
  status: "active" | "completed" | "missed";
};

const props = defineProps<{ task: Task }>();
</script>

<template>
  <tr>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
      <div>
        <h2 class="font-medium text-gray-800 dark:text-white">
          {{ props.task.title }}
        </h2>
      </div>
    </td>
    <td class="px-4 py-4 text-sm whitespace-nowrap">
      <div>
        <h4 class="text-gray-700 dark:text-gray-200">
          {{ props.task.description }}
        </h4>
      </div>
    </td>
    <td class="px-4 py-4 text-sm whitespace-nowrap">
      <div>
        <h4 class="text-gray-700 dark:text-gray-200">
          {{ props.task.dueDate.toDateString() }}
        </h4>
      </div>
    </td>
    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
      <div
        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800"
      >
        {{ props.task.status }}
      </div>
    </td>
  </tr>
</template>

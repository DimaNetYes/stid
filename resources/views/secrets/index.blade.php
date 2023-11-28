
<!-- resources/js/Pages/Secrets/Index.vue -->

<template>
  <div>
    <h1>Мои секреты</h1>
    <ul>
      <li v-for="secret in secrets" :key="secret.id">
        <InertiaLink :href="route('secrets.edit', secret.id)">
          {{ secret.title }}
        </InertiaLink>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    secrets: Array,
  },
};
</script>
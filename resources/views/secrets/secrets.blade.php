<!-- resources/views/secrets.blade.php или компонент Vue.js -->

<template>
  <div>
    <!-- Другие элементы и компоненты -->
    <div>
      <InertiaLink :href="route('secrets.index')">Мои секреты</InertiaLink>
      <InertiaLink :href="route('secrets.create')">Создать секрет</InertiaLink>
    </div>
    <div>
      @inertia
    </div>
  </div>
</template>
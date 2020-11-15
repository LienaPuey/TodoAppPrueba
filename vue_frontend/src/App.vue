<template>
<TodoBuilder />
</template>

<script>
import TodoBuilder from './pages/TodoBuilder.vue'
require('./assets/styles/main.scss');
export default {
  name: 'App',
  components: {
    TodoBuilder
  }
}
</script>



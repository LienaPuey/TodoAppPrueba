<template>
  <div id="app">
   
    <Todo />
  </div>
</template>

<script>
import TodoBuilder from './components/TodoBuilder.vue'

export default {
  name: 'App',
  components: {
    TodoBuilder
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>

<template>
  <div id="app">
      <div class= "todo-wrapper">
         <div class= "todo-container">
            <TodoBuilder />
          </div>
        </div>
  </div>
</template>

<script>
import TodoBuilder from './pages/TodoBuilder.vue'

export default {
  name: 'App',
  components: {
    TodoBuilder
  }
}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.app-error {
  color: #ff1212;
}
.app-form {
    .label{
        display: block;
        font-size: 18px;
        font-weight: bold;
    }
    .form-input {
        padding: 7px;
        font-size: 15px;
    }
    .form-control {
        margin-bottom: 10px;

        &-last {
          margin-bottom: 0;
        }
    }
}
.is-warning{
  background-color: hsl(29, 100%, 80%);
}
.is-danger{
  background-color: hsl(0, 100%, 76%);
}

.todo {
  &-wrapper {
    /*flex styling*/
    display: flex;
    /*defines alingment along the main axis (horizontal)*/
    justify-content: center;
    /*flex direction*/
    /* flex-direction: column; vertical axis
    width: 100%;
    height: 2000px; */
  }
  &-container {
    display: flex;
    flex-direction: column;
    width: 400px;
    min-height: 400px;
    background-color: hsl(138, 70%, 90%);
    border-radius: 25px;
  }
  &-create-btn-container{
    margin: 10px;
  }
}
.app-button{
font-size: 20px;
padding: 20px;
border-radius: 25px;
background-color: #5bc0a0;
color: white;
font-weight: bold;

&:hover {
  cursor: pointer;
  }
}
</style>

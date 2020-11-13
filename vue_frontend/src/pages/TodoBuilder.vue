<template>
<div>

</div>
</template>

<script>
import List from "../components/List.vue";
import Item from "../components/Item.vue";
import Button from "../components/Button.vue";
import TodoService from '../service/TodoService';

export default {
    name: 'Todos',
    async mounted() {
        const todos = await TodoService.getTodos();
        if(todos){
            this.todos=todos;
            }
        },

    data(){
        return {
            todos: [],
            newTodo: {
                title: '',
                description: ''}
            }
        },
    components: {
        List,
        Item,
        Button
        },
    methods: {

        }
}




</script>


<style scoped>
</style>
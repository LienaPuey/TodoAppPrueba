<template>
    <div>
        <List >
            <Item 
                v-for="item in filteredTodos" 
                v-bind:key="item.id">

                    <span slot="title">{{item.title}}</span>
                    <span slot="description">{{item.description}}</span>

                    <Button 
                        v-bind:class="{red:!item.isDone, green:item.isDone}" 
                        slot="leftBtn" 
                        @click="toggleTodo(item.id)">{{item.isDone}}
                    </Button>

                    <span slot="newTime">{{item.addTime.date}}</span>   
                    <span slot="doneTime" 
                    v-if="item.doneTime !== undefined && item.isDone">
                    {{item.doneTime.date}}</span>

                    <Button 
                        v-bind:class="{red:true}" 
                        slot="rightBtn"  
                        @click="deleteTodo(item.id)">Delete
                    </Button>
            </Item>
        </List>
        <div class="input">

            <input v-model="newTodo.title" type="text" placeholder="What needs to be done?"/>
            <input v-model="newTodo.description" type="text" placeholder="Add a description"/>
            <Button 
                v-bind:class="{white:true}" 
                @click="addTodo()">Save
            </Button>      
        </div>
        <Button @click="toggleFilter()">Show done To-Dos</Button>
    </div>
</template>

<script>
import List from "../components/List.vue";
import Item from "../components/Item.vue";
import Button from "../components/Button.vue";
import TodoService from '../services/TodoService';

export default {
    name: 'Todos',
    async mounted() {
        const todos = await TodoService.getTodos();
        if(todos){
            this.todos=todos;
        }
    },
    computed: {
        filteredTodos(){
            if(!this.filter) return this.todos;
            return this.todos.filter(todo=>!todo.isDone);
        }
    },
    data(){
        return {
            todos: [],
            newTodo: {
                title: '',
                description: ''},
            filter: true
            }
        },
    components: {
        List,
        Item,
        Button
        },
    methods: {
        toggleFilter(){
            this.filter = !this.filter;
        },
        async addTodo(){
            const newTodo = await TodoService.addTodo(this.newTodo.title, this.newTodo.description);
            if(newTodo.id){
                const newTodos = [...this.todos, newTodo];
                this.todos = newTodos;
                this.newTodo= '';
            }
        },

        async toggleTodo(id){
            const toggled = await TodoService.toggleTodo(id);
            if(toggled.status !== undefined) {
                let newTodos = [...this.todos];
                const index = newTodos.findIndex(todo => todo.id == id);
                newTodos[index] = {...newTodos[index], isDone: toggled.status, doneTime:toggled.doneTime};
                this.todos = newTodos;
            }
        },

        async deleteTodo(){
            //chequear como hace vue para que reconozca los objetos nuevos
            
        }

    }
}
</script>


<style scoped>
</style>
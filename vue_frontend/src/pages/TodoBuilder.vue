<template>
<div class="grid-container">
    <div class="left-container">
    
    <div class="input-wrapper">                        
        <input class="input-title" v-model="newTodo.title" type="text" placeholder="What needs to be done?"/>
        <textarea class="input-description" v-model="newTodo.description" type="text" placeholder="Add a description"/>
            
            <Button 
                class="save" 
                @click="addTodo()">Save
            </Button>      
    </div>   
                  
    </div>
    <div class="right-container">
        <Button class="show" @click="toggleFilter()" v-if="!filter">Show unfinished To-Dos</Button>
        <Button class="show" @click="toggleFilter()" v-else>Show all To-Dos</Button>

        <List>           
            <Item 
                v-for="item in filteredTodos" 
                v-bind:key="item.id">
                    
                    <span slot="title">{{item.title}}</span>
                    <span slot="description">{{item.description}}</span>
                    
                    <Button 
                        class="done"
                        slot="leftBtn" 
                        @click="toggleTodo(item.id)"
                        v-if="item.isDone === true">{{undone}}
                    </Button>
                    <Button 
                        class="done"
                        slot="leftBtn" 
                        @click="toggleTodo(item.id)"
                        v-else>{{done}}
                    </Button>
                    
                    <span slot="newTime">Added date:{{item.addTime.date}}</span>   
                    <span slot="doneTime" 
                    v-if="item.doneTime !== undefined && item.isDone ===true">Done date:
                    {{item.doneTime.date}}</span>

                    <Button 
                        class="delete"
                        slot="rightBtn"  
                        @click="deleteTodo(item.id)">Delete
                    </Button>
                    
            </Item>            
        </List>
    
    </div>
    </div>
</template>

<script>
import List from "../components/List.vue";
import Item from "../components/Item.vue";
import Button from "../components/Button.vue";
import TodoService from '../services/TodoService';
require('../assets/styles/main.scss');
export default {
    name: 'Todos',
    async mounted() {
        const todos = await TodoService.getTodos();
        if(todos){
            this.todos = todos;
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
                    description: '',
                    isDone: false               
                },
                filter: false,
                done: "Done",
                undone: "Undone"
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
            
            const newTodo = await TodoService.addTodo(this.newTodo.title, this.newTodo.description, this.newTodo.isDone);
            if (this.newTodo.title.length < 4) {
                alert('Title must be longer!');

            } else if(newTodo.id){
                const newTodos = [...this.todos, newTodo];
                this.todos = newTodos;
                
            }
            this.newTodo = {title:'', description:''}
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

        async deleteTodo(id){
            if(await TodoService.deleteTodo(id)){
                // Para que el comparador del dom virtual de VUE distinga que los objetos son nuevos y por ende distintos, forzando un refresh
             // si se hace todo sobre this.todos, la referencia no cambia y no vuelve a renderizar
            
                let newTodos = [...this.todos];
                const index = newTodos.findIndex(todo => todo.id == id);
                newTodos.splice(index, 1);
                this.todos = newTodos;
            }
        }
    }
        
}

</script>

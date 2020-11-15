<template>
<div class="grid-container">
    <div class="left-container">
       
        
       
            
            <form class="input-wrapper" >
            <input class="input-title" v-model="newTodo.title" type="text" placeholder="What needs to be done?"/>
            <textarea class="input-description" v-model="newTodo.description" type="text" placeholder="Add a description"/>
            
            <Button 
                class="save-button" 
                @click="addTodo()">Save
            </Button>      
            </form>
        
           
        
    </div>
    <div class="right-container">
        <List>
            <Item 
                v-for="item in filteredTodos" 
                v-bind:key="item.id">
                    
                    <span slot="title">{{item.title}}</span>
                    <span slot="description">{{item.description}}</span>

                    <Button 
                        class="done-button"
                        slot="leftBtn" 
                        @click="toggleTodo(item.id)">{{item.isDone}}
                    </Button>
                    
                    <span slot="newTime">Added date:{{item.addTime.date}}</span>   
                    <span slot="doneTime" 
                    v-if="item.doneTime !== undefined && item.isDone ===true">Done date:
                    {{item.doneTime.date}}</span>

                    <Button 
                        class="delete-button"
                        slot="rightBtn"  
                        @click="deleteTodo(item.id)">Delete
                    </Button>
                    
            </Item>
           
            <Button class="show-button" @click="toggleFilter()">Show finished To-Dos</Button>
            
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
            if(!this.filter) {
            return this.todos
            }else{
            return this.todos.filter(todo=>!todo.isDone);
            }
        }//crearle una seccion a la derecha sin botón
    },
    data(){
        return {
            todos: [],
            newTodo: {
                title: '',
                description: '',
                isDone: false,
                filter: true
                }
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
            if(newTodo.id){
                const newTodos = [...this.todos, newTodo];
                this.todos = newTodos;
                console.log(typeof newTodo);
                this.resetform();
            }
            this.data.newTodo= '';
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

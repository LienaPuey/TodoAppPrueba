<script>
import axios from 'axios';
// axios.defaults.baseURL = "api";
export default {
    async addTodo(title, description){
        if(title === '') return;
        const response = await axios.post("/api/add",{
            title, description
        });
        if(response.data.id){
            return response.data;
        }
        return;
    },
    async toggleTodo(id){
        const response = await axios.put("/api/toggle", {id});
        return response.data;
    },
    async deleteTodo(id){
        const response = await axios.delete("/api/list/" + id);
        return response.data.removed;
    }, 
    async getTodos(){
        const response = await axios.get('/api/list',{
             headers: { 'Content-Type': 'application/json'}
        });
        return response.data.data;//json devuelve data siempre, el otro data es el del controlador, cuidado aquí
    }
}
</script>
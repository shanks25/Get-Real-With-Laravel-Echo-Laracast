<template>
    <div>
        <ul>
            <li v-for="task in tasks">{{task}}</li>
            <input type="text" v-model="newTask" @blur="addTask">
        </ul>
    </div>
</template>

<script>
export default {
    data(){
        return{
            tasks:[],
            newTask:''
        }
    },
    created(){
        axios.get('tasks').then(response=>(this.tasks=response.data));  
        window.Echo.channel('tasks').listen('TaskCreated',e=>{
             this.tasks.push(e.task.body)
        });
    },  
    methods:{
        addTask(){
            axios.post('tasks',{body:this.newTask}); 
            this.tasks.push(this.newTask);
            this.newTask='';
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

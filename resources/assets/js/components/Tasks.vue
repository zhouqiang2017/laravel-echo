<template>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item" v-for="task in tasks" v-text="task"></li>
        </ul>
        <hr>
        <form action="" method="post" @submit.prevent="addTask">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="add a task" v-model="newTask">
            </div>
            <button class="btn btn-primary" type="submit">submit</button>
    </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                newTask: ''
            }
        },
        mounted() {
           axios.get('/tasks').then( respnose => {
                this.tasks = respnose.data
           });
            window.Echo.channel('tasks').listen('TaskCreated', e => {

                console.log(e);
                this.tasks.push(e.task.body)
            });
        },
        methods: {
            addTask(){
                axios.post('/tasks',{body: this.newTask});
                this.tasks.push(this.newTask);
                this.newTask = '';
            }
        }
    }
</script>

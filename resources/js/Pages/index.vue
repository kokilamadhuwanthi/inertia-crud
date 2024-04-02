<script setup>
defineProps({ students: Object });
import { router } from '@inertiajs/vue3';

function destroy(id) {
    router.delete(`/students/${id}`);
}
function edit(id){
    router.get('/students/'+id+'/edit')
}

</script>

<template>
    <div class="flex justify-center items-center h-screen"> <!-- Center vertically and horizontally -->
        <div class="card p-8 w-96"> <!-- Add padding and set width -->
            <div class="card-header text-xl font-bold mb-4"> <!-- Increase font size and add margin -->
                Student
            </div>
            <div class="card-body">
                <div v-if=" $page.props.flash.message" class="alert alert-success">
                <strong>{{$page.props.flash.message  }}</strong>
            </div>
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="student.id">
                            <td>{{ student.name }}</td>
                            <td>
                                <button class="btn btn-outline-warning">View</button>
                                <button @click.prevent="edit(student.id)" class="btn btn-outline-primary">Edit</button> 
                                <button @click.prevent="destroy(student.id)" class="btn btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

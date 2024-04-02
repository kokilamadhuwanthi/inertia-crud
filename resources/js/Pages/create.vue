<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
     errors:Object
});

const form=useForm({
        name:null,
        age:null,
        status:null,
});

function submit(){
        router.post('/students',form)
}
</script>

<template>
     <div class="flex justify-center items-center h-screen"> <!-- Center vertically and horizontally -->
    <div class="card p-8 w-96"> <!-- Add padding and set width -->
        <div class="card-header text-xl font-bold mb-4"> <!-- Increase font size and add margin -->
            Create Student
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name" aria-describedby="name">
                    <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
                </div>
                <div class="mb-4">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" v-model="form.age" class="form-control" id="age" aria-describedby="age">
                    <div class="text-danger text-xs" v-if="errors.age">{{ errors.age }}</div>
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" v-model="form.status" class="form-control" id="status">
                    <div class="text-danger text-xs" v-if="errors.status">{{ errors.status }}</div>
                </div>
                <button type="submit" class="btn btn-primary w-full">Submit</button> <!-- Make button full width -->
            </form>
        </div>
    </div>
</div>

</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {useForm} from '@inertiajs/vue3';
import {router} from '@inertiajs/vue3';

const form=useForm({
        name:null,
        image:null,
        age:null,
        status:null,
        });

function submit(){
        router.post('students',form)
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">You're logged in!</div>
            </div>
            <div class="text-center">
            <h2 class="text-4xl font-bold mb-4">Do you want to create a student?</h2>
        <p><a href="/students/create">Click here</a></p>
        </div>
            
        </div>
    </AuthenticatedLayout>
</template>

<style>
/* Add custom styles here if needed */
</style>
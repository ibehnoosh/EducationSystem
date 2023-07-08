<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <table>
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td>{{ category.title }}</td>
                                <td>{{ category.comment }}</td>
                                <td>
                                    <button @click="editCategory(category.id)">Edit</button>
                                    <button @click="deleteCategory(category.id)">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            required: true,
        },
    },
    methods: {
        editCategory(categoryId) {
            this.$inertia.visit(`/categories/edit/${categoryId}/`);
        },
        deleteCategory(categoryId) {
            axios.delete(`/categories/${categoryId}`)
                .then(response => {
                    console.log('Category deleted successfully');
                })
                .catch(error => {
                    console.error('Error deleting category', error);
                });
        },
    },
};
</script>



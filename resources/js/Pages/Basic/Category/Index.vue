<script setup>
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Categories" />
    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>
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
    </Layout>
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
                    // Handle successful deletion
                    console.log('Category deleted successfully');
                    // You can perform additional actions here, such as showing a success message or updating the category list
                })
                .catch(error => {
                    // Handle error
                    console.error('Error deleting category', error);
                    // You can display an error message or handle the error as needed
                });
        },
    },
};
</script>

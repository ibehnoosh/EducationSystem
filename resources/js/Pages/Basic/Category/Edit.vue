<template>
    <div>
        <h1>Edit Category</h1>
        <form @submit.prevent="updateCategory">
            <div>
                <label>Title:</label>
                <input v-model="category.title" type="text" required />
            </div>
            <div>
                <label>Comment:</label>
                <input v-model="category.comment" type="text" required />
            </div>
            <div>
                <label>Active:</label>
                <input v-model="category.is_active" type="checkbox" />
            </div>
            <div>
                <label>Private:</label>
                <input v-model="category.has_private" type="checkbox" />
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        category: {
            type: Object,
            required: true,
        },
    },
    methods: {
        updateCategory() {
            axios.put(`/categories/${this.category.id}`, this.category)
                .then(response => {
                    // Handle successful update
                    console.log('Category updated successfully');
                    // You can perform additional actions here, such as showing a success message or redirecting
                })
                .catch(error => {
                    // Handle error
                    console.error('Error updating category', error);
                    // You can display an error message or handle the error as needed
                });
        },
    },
};
</script>


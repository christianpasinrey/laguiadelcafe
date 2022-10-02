<template>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.author.name }}</td>
                    <td>{{ post.created_at }}</td>
                    <td>{{ post.updated_at }}</td>
                    <td>{{ post.status }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" @click="editPost(post)">Edit</button>
                        <button class="btn btn-sm btn-danger" @click="deletePost(post)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script setup>
    import { reactive,inject } from 'vue';
    const form = reactive({
        title: '',
        content: '',
        category_id: '',
        tags: [],
        status: ''
    });
    const posts = inject('posts');
    const categories = reactive([]);

    const getCategories = async () => {
        const response = await fetch('categories');
        categories = await response.json();
    }

</script>

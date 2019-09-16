<template>
    <div class="container">
        <div class="row justify-content-center">
            <h3>Notes list</h3>
            <div v-if="loading" style="display: block; width: 100%; text-align: center;">Loading...</div>
            <div v-if="error" style="display: block; width: 100%; text-align: center;" class="alert alert-danger" >{{error}}</div>
            <table class="table table-bordered" id="laravel_crud" v-if="!loading && !error">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>Deleted at</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="note in notes" :class="{ 'deleted': note.deleted_at}">
                        <td>{{ note.id }}</td>
                        <td>{{ note.title }}</td>
                        <td>{{ note.content }}</td>
                        <td>{{ note.created_at }}</td>
                        <td>{{ note.deleted_at }}</td>
                        <td colspan="2">
                            <div v-if="!note.deleted_at" >
                                <router-link :to="{ name: 'view', params: { id: note.id } }" class="btn btn-success">View</router-link>
                                <router-link :to="{ name: 'edit', params: { id: note.id } }" class="btn btn-primary">Edit</router-link>
                                <a href="#" v-on:click='deleteData(note.id)' class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import Api from '../api/Notes';

    export default {
        mounted() {
            console.log('List component mounted.')
        },
        data() {
            return {
                loading: false,
                notes: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.notes = null;
                this.loading = true;

                Api.all()
                    .then(response => {
                        this.notes = response.data;
                        this.loading = false;
                    }).catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            },
            deleteData(id) {
                this.loading = true;
                console.log('delete data ' + id);

                Api.delete(id)
                    .then(response => {
                        this.notes = response.data;
                        this.loading = false;
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });

                this.loading = false
            },
        }
    }
</script>

<style scoped>
    .deleted {
        color: #999!important;
        text-decoration: line-through;
    }
</style>

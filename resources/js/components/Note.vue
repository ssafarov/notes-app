<template>
    <div class="container">
        <div class="row justify-content-center">
            <h3 v-if="this.$route.name === 'create'">Create new note</h3>
            <h3 v-else-if="this.$route.name === 'edit'">Edit note</h3>
            <h3 v-else> View Note</h3>
        </div>
        <div class="row justify-content-center" v-if="(this.$route.name === 'view') || (this.$route.name === 'delete')">
            <div v-if="loading" style="display: block; width: 100%; text-align: center;">Loading...</div>
            <div v-if="error" style="display: block; width: 100%; text-align: center;" class="alert alert-danger" >{{error}}</div>

            <div v-if="!noteFound & !loading" style="display: block; width: 100%; text-align: center;" class="alert alert-warning" >Note not found or deleted.</div>

            <div class="card" v-if="!loading && !error && noteFound" >
                <div class="card-header">
                    <h4 class="card-title">{{note.title}}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">{{note.content}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" v-if="(this.$route.name === 'edit') || (this.$route.name === 'create')">
            <form @submit.prevent="onSubmit($event)">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" v-model="note.title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control" col="4" name="content"
                                      placeholder="Enter Content" v-model="note.content"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" :disabled="saving">Save</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row justify-content-center" v-if="message">
            <div class="alert alert-info">{{message}}</div>
        </div>

        <div class="row justify-content-center">
            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Return to list</router-link>
        </div>
    </div>
</template>

<script>
    import Api from '../api/Notes';

    export default {
        mounted() {
            console.log('Note component mounted.');
        },
        data() {
            return {
                saving: false,
                loading: false,
                note: {},
                noteFound: false,
                error: null,
                message: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                this.error = this.message = null;
                this.note = {};
                    Api.find(this.$route.params.id)
                    .then(response => {
                        this.note = response.data;
                        this.noteFound = Object.keys(this.note).length > 0;

                        console.log (this.note);
                        this.loading = false;
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
            },
            onSubmit(event) {
                this.saving = true;

                Api.update(this.note.id, {
                    title: this.note.title,
                    content: this.note.content,
                }).then((response) => {
                    this.message = 'Done!';
                    setTimeout(() => this.message = null, 2000);
                    this.note = response.data;
                }).catch(error => {
                    console.log(error);
                    this.message = error;
                    setTimeout(() => this.message = null, 3000);
                    this.saving = false;
                    this.note = response.data;
                }).then(_ => this.saving = false);
            },
        }
    }
</script>


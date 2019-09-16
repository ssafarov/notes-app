<template>
    <div class="row">
        <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a href="/" class="welcome-lnk " ><h2>Notes Application</h2></a>
            </div>

            <div class="col-md-2" v-if="['home'].includes($route.name)">
                <router-link :to="{ name: 'create' }" class="btn btn-success">Add New Note</router-link>
            </div>

        </div>
        <div class="row">
            <div class="container">
                <router-view></router-view>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>

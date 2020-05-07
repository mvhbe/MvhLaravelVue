<template>
    <div>
        <navigation></navigation>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Navigation from "./components/Navigation";
    export default {
        name: "Main",
        components: {
            Navigation
        }
    }
</script>

<style scoped>

</style>

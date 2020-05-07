<template>
<!--    <a class="nav-item nav-link" href="#" v-text="link"></a>-->
    <router-link :to="link.to" exact>
        <a class="nav-item nav-link" v-text="link.text"></a>
    </router-link>
</template>

<script>
    export default {
        name: "NavigationItem",
        props: ['link'],
    }
</script>

<style scoped>

</style>

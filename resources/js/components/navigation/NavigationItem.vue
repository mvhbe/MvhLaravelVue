<template>
    <router-link class="nav-item nav-link"
                 :to="{ name: routerLink.name }"
                 v-text="routerLink.text"
                 exact
    >
    </router-link>
</template>

<script>
    export default {
        name: "NavigationItem",
        props: ['routerLink'],
    }
</script>

<style scoped>

</style>

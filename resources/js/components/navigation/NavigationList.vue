<template>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" v-for="routerLink in routerLinks">
            <navigation-item :routerLink="routerLink"></navigation-item>
        </div>
    </div>
</template>

<script>
    import NavigationItem from "./NavigationItem";
    export default {
        name: "NavigationList",
        components: {
            NavigationItem
        },
        props: ['routerLinks'],
    }
</script>

<style scoped>

</style>

<template>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" v-for="item in navigationItems">
            <navigation-item :link="item"></navigation-item>
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
        data() {
            return {
                navigationItems: [
                    { to: "/", text: "Home" },
                    { to: "/kalenders", text: "Kalenders" },
                    { to: "/uitslagen", text: "Uitslagen" },
                ]
            }
        }
    }
</script>

<style scoped>

</style>

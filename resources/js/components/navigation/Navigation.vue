<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <router-link class="navbar-brand"
                         :to="{ name: brandLink.name }"
                         v-text="brandLink.text"
                         exact
            >
            </router-link>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <navigation-list :routerLinks="routerLinks"></navigation-list>
        </div>
    </nav>
</template>

<script>
    import NavigationList from "./NavigationList";
    import navigationData from "../../navigation-data";
    export default {
        name: "Navigation",
        components: {
            NavigationList
        },
        data() {
            return navigationData
        }
    }
</script>

<style scoped>

</style>

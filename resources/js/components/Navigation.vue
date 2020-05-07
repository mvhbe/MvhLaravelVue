<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand">Visclub Moed & Volharding</a>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <navigation-list></navigation-list>
        </div>
    </nav>
</template>

<script>
    import NavigationList from "./NavigationList";
    export default {
        name: "Navigation",
        components: {
            NavigationList
        },
    }
</script>

<style scoped>

</style>

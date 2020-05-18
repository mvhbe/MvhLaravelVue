<template>
    <div>
        <wedstrijd-item
            v-for="wedstrijd in wedstrijden" :wedstrijd="wedstrijd"
            :key="wedstrijd.id"
            :show-uitslag-link="showUitslagLink"
        >
        </wedstrijd-item>
    </div>
</template>

<script>
    import WedstrijdItem from "./WedstrijdItem";

    export default {
        name: "WedstrijdenList",
        props: [
            'wedstrijden',
            'showUitslagLink'
        ],
        components: {
            WedstrijdItem,
        }
    }
</script>

<style scoped>

</style>

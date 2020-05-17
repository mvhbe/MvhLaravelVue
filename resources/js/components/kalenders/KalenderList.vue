<template>
    <div>
        <kalender-item v-for="kalender in kalenders" :kalender="kalender" :key="kalender.id"></kalender-item>
    </div>
</template>

<script>
    import KalenderItem from "./KalenderItem";
    export default {
        name: "KalenderList",
        props: [
            'kalenders',
        ],
        components: {
            KalenderItem,
        },
    }
</script>

<style scoped>

</style>

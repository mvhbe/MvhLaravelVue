<template>
    <div>
        <uitslag-item
            v-for="uitslag in uitslagList" :uitslag="uitslag"
            :key="uitslag.volgorde"
        >
        </uitslag-item>
    </div>
</template>

<script>
    import UitslagItem from "./UitslagItem";

    export default {
        name: "UitslagList",
        props: [
            'uitslagList'
        ],
        components: {
            UitslagItem
        }
    }
</script>

<style scoped>

</style>

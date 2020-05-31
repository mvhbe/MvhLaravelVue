<template>
    <div>
        <uitslag-detail-item
            v-for="uitslagDetail in uitslagDetailList" :uitslag-detail="uitslagDetail"
            :key="uitslagDetail.volgorde"
        >
        </uitslag-detail-item>
    </div>
</template>

<script>
    import UitslagDetailItem from "./UitslagDetailItem";

    export default {
        name: "UitslagDetailList",
        props: [
            'uitslagDetailList'
        ],
        components: {
            UitslagDetailItem
        }
    }
</script>

<style scoped>

</style>

<template>
        <li class="list-group-item text-center">
            <span class="mr-3" style="color: rgb(59, 139, 182);">
                <i class="fas fa-calendar-alt"></i>
            </span>
            <span class="mr-3" v-text="kalender.omschrijving"></span>
            <router-link
                class="btn btn-primary"
                :to="{ name: 'kalenderwedstrijden', params: { jaar: kalender.jaar } }"
            >
                Wedstrijden
            </router-link>
        </li>
</template>

<script>
    export default {
        name: "KalenderItem",
        props: [
            'kalender',
        ],
    }
</script>

<style scoped>

</style>

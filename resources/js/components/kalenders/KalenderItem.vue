<template>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mb-2 shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title">
                        <span class="mr-3" style="color: #2FA4E7;">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <span class="mr-3" v-text="kalender.omschrijving"></span>
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex justify-content-start">
                            # wedstrijden
                            <span class="ml-5 badge-primary badge-pill" v-text="kalender.aantal_wedstrijden"></span>
                        </div>
                        <div class="d-flex justify-content-end"
                             v-if="kalender.aantal_wedstrijden > 0"
                        >
                            <router-link
                                class="btn btn-primary"
                                :to="{ name: 'kalenderwedstrijden', params: { jaar: kalender.jaar } }"
                            >
                                Wedstrijden<i class="fas fa-arrow-alt-circle-right ml-2"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

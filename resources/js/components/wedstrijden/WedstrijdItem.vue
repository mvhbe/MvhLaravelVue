<template>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mb-2 shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title">
                        <span class="mr-3" style="color: rgb(59, 139, 182);">
                            <i class="fas fa-columns"></i>
                        </span>
                        <span class="mr-3" v-text="wedstrijd.omschrijving"></span>
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex justify-content-start">
                            <span class="mr-3" v-text="wedstrijd.datum"></span>
                            <span v-text="wedstrijd.aanvang"></span>
                        </div>
                        <div class="d-flex justify-content-end" v-if="showUitslagLink">
                            <router-link
                                class="btn btn-primary"
                                :to="{ name: 'westrijduitslag', params: { jaar: wedstrijd.id } }"
                            >
                                Uitslag<i class="fas fa-arrow-alt-circle-right ml-2"></i>
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
        name: "WedstrijdItem",
        props: [
            'wedstrijd',
            'showUitslagLink'
        ]
    }
</script>

<style scoped>

</style>

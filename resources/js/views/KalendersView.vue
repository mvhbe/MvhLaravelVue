<template>
    <div>
        <div v-if="isLoading">
            <loading-card></loading-card>
        </div>
        <div v-if="!isLoading">
            <div class="mb-5">
                <div class="text-center">
                    <h1>Kalenders</h1>
                </div>
                <div v-if="kalenders.length > 0">
                    <kalender-list :kalenders="kalenders"></kalender-list>
                    <div class="text-center mt-3">
                        <button
                            class="btn btn-primary"
                            @click.prevent="meerKalendersLaden"
                            v-if="next_page_url">Meer kalenders ...
                        </button>
                    </div>
                </div>
                <div class="text-center" v-else>
                    <info-card>
                        Geen wedstrijden beschikbaar!
                    </info-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import InfoCard from "../components/InfoCard";
    import LoadingCard from "../components/LoadingCard";
    import KalenderList from "../components/kalenders/KalenderList";

    export default {
        name: "Kalenders",
        components: {
            InfoCard,
            KalenderList,
            LoadingCard,
        },
        data() {
            return {
                kalenders: [],
                next_page_url: "",
                isLoading: false,
            }
        },
        methods: {
            meerKalendersLaden() {
                axios.get(this.next_page_url)
                    .then(
                        response => {
                            response.data.data.forEach(
                                kalender => this.kalenders.push(kalender)
                            )
                            this.next_page_url = response.data.links.next;
                        }
                    );
            }
        },
        created() {
            this.isLoading = true;
            axios.get("/api/kalenders")
                .then(
                    response => {
                        this.kalenders = response.data.data;
                        this.next_page_url = response.data.links.next;
                    }
                );
            this.isLoading = false;
        }
    }
</script>

<style scoped>

</style>

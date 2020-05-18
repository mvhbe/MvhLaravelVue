<template>
    <div>
        <div v-if="isLoading">
            <loading-card></loading-card>
        </div>
        <div v-if="!isLoading">
            <div class="mb-5">
                <div class="text-center">
                    <h1><span v-text="kalender.omschrijving"></span> - Wedstrijden</h1>
                </div>
                <div v-if="wedstrijden.length > 0">
                    <wedstrijden-list
                        :wedstrijden="wedstrijden"
                        :show-uitslag-link="metUitslagLink"
                    ></wedstrijden-list>
                    <div class="text-center mt-3">
                        <button
                            class="btn btn-primary"
                            @click.prevent="meerWedstrijdenLaden"
                            v-if="next_page_url">Meer wedstrijden ...
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
    import WedstrijdenList from "../components/wedstrijden/WedstrijdenList";

    export default {
        name: "KalenderWedstrijdenView",
        components: {
            InfoCard,
            WedstrijdenList,
            LoadingCard,
        },
        data() {
            return {
                wedstrijden: [],
                kalender: {},
                next_page_url: "",
                isLoading: true,
                metUitslagLink: true,
            }
        },
        methods: {
            meerWedstrijdenLaden() {
                axios.get(this.next_page_url)
                    .then(
                        response => {
                            response.data.data.forEach(
                                wedstrijd => this.wedstrijden.push(wedstrijd)
                            )
                            this.next_page_url = response.data.links.next;
                        }
                    );
            }
        },
        created() {
            this.isLoading = true;
            axios.get(`/api/kalenders/${this.$route.params.jaar}`)
                .then(
                    response => {
                        this.kalender = response.data.data;
                    }
                );
            axios.get(`/api/kalenders/${this.$route.params.jaar}/wedstrijden`)
                .then(
                    response => {
                        this.wedstrijden = response.data.data;
                        this.next_page_url = response.data.links.next;
                    }
                );
            this.isLoading = false;
        }
    }
</script>

<style scoped>

</style>

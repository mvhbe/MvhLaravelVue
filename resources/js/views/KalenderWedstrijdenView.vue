<template>
    <div class="mb-5">
        <div class="text-center">
            <h1>{{ kalender.omschrijving }} - Wedstrijden</h1>
        </div>
        <div v-if="wedstrijden.length > 0">
            <wedstrijden-list :wedstrijden="wedstrijden"></wedstrijden-list>
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
</template>

<script>
    import InfoCard from "../components/InfoCard";
    import WedstrijdenList from "../components/wedstrijden/WedstrijdenList";

    export default {
        name: "KalenderWedstrijdenView",
        components: {
            InfoCard,
            WedstrijdenList,
        },
        data() {
            return {
                wedstrijden: [],
                kalender: null,
                next_page_url: ""
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
            console.log(this.$route.params.jaar);
            axios.get(`/api/kalenders/${this.$route.params.jaar}`)
                .then(
                    response => {
                        console.log(response.data.data);
                        this.kalender = response.data.data;
                    }
                );
            axios.get(`/api/kalenders/${this.$route.params.jaar}/wedstrijden`)
                .then(
                    response => {
                        console.log(response.data.data);
                        this.wedstrijden = response.data.data;
                        this.next_page_url = response.data.links.next;
                    }
                );
        }
    }
</script>

<style scoped>

</style>

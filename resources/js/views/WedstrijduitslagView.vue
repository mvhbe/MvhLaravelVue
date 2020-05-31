<template>
    <div>
        <div v-if="isLoading">
            <loading-card></loading-card>
        </div>
        <div v-if="!isLoading">
            <div class="mb-5">
                <div class="text-center">
                    <h1><span v-text="wedstrijd.datum"></span> - Uitslag</h1>
                </div>
                <uitslag-summary
                    :aantal-deelnemers="uitslag['aantal_deelnemers']"
                    :totaal-gewicht="uitslag['totaal_gewicht']"
                    :gemiddeld-gewicht="uitslag['gemiddeld_gewicht']"
                >
                </uitslag-summary>
                <div v-if="uitslag">
                    <uitslag-detail-list
                        :uitslag-detail-list="uitslag.details"
                    ></uitslag-detail-list>
                </div>
                <div class="text-center" v-else>
                    <info-card>
                        Geen uitslag beschikbaar!
                    </info-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LoadingCard from "../components/LoadingCard";
    import InfoCard from "../components/InfoCard";
    import UitslagSummary from "../components/uitslag/UitslagSummary";
    import UitslagDetailList from "../components/uitslag/UitslagDetailList";

    export default {
        name: "WedstrijduitslagView",
        data() {
            return {
                wedstrijd: {},
                isLoading: false,
                uitslag: {}
            }
        },
        components: {
            LoadingCard,
            InfoCard,
            UitslagSummary,
            UitslagDetailList
        },
        methods: {
            // meerLaden() {
            //     axios.get(this.next_page_url)
            //         .then(
            //             response => {
            //                 response.data.data.forEach(
            //                     uitslag => this.uitslag.push(uitslag)
            //                 )
            //             }
            //         )
            // }
        },
        created() {
            this.isLoading = true
            let wedstrijdDatum = this.$route.params.datum;
            axios.get(`/api/wedstrijden/${wedstrijdDatum}`)
                .then(
                    response => {
                        this.wedstrijd = response.data.data;
                    }
                );
            axios.get(`/api/wedstrijden/${wedstrijdDatum}/uitslag`)
                .then(
                    response => {
                        this.uitslag = response.data.data[0];
                    }
                )
                .then(
                    this.isLoading = false
                );
        }
    }
</script>

<style scoped>

</style>

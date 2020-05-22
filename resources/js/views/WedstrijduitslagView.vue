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
                <div v-if="uitslagList.length > 0">
                    <uitslag-list
                        :uitslag-list="uitslagList"
                    ></uitslag-list>
                    <div class="text-center mt-3">
                        <button
                            class="btn btn-primary"
                            @click.prevent="meerLaden"
                            v-if="next_page_url">Meer ...
                        </button>
                    </div>
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
    import UitslagList from "../components/uitslag/UitslagList";

    export default {
        name: "WedstrijduitslagView",
        data() {
            return {
                wedstrijd: {},
                next_page_url: "",
                isLoading: false,
                uitslagList: []
            }
        },
        components: {
            LoadingCard,
            InfoCard,
            UitslagList
        },
        methods: {
            meerLaden() {
                axios.get(this.next_page_url)
                    .then(
                        response => {
                            response.data.data.forEach(
                                uitslag => this.uitslagList.push(uitslag)
                            )
                            this.next_page_url = response.data.links.next;
                        }
                    )
            }
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
                        this.uitslagList = response.data.data;
                        this.next_page_url = response.data.links.next;
                    }
                )
            this.isLoading = false;
        }
    }
</script>

<style scoped>

</style>

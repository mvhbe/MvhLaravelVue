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
                isLoading: true,
                metUitslagLink: true,
            }
        },
        methods: {
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
                    }
                )
                .catch( error => console.log)
                .then(
                    () => this.isLoading = false
                );
        }
    }
</script>

<style scoped>

</style>

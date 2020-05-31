<template>
    <div>
        <div v-if="isLoading">
            <loading-card></loading-card>
        </div>
        <div v-if="!isLoading">
            <div class="mb-5">
                <div class="text-center">
                    <h1>Deze maand</h1>
                </div>
                <div v-if="wedstrijden.length > 0">
                    <wedstrijden-list
                        :wedstrijden="wedstrijden"
                        :show-uitslag-link="geenUitslagLink"
                    >
                    </wedstrijden-list>
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
        components: {
            InfoCard,
            LoadingCard,
            WedstrijdenList,
        },
        data() {
            return {
                isLoading: false,
                wedstrijden:[],
                geenUitslagLink: false,
            }
        },
        created() {
            this.isLoading = true;
            axios.get("/api/wedstrijden/huidigemaand")
                .then(
                    response => {
                        this.wedstrijden = response.data.data;
                    }
                )
                .catch(error => console.log.error)
                .then(() => this.isLoading = false);
        }
    }
</script>

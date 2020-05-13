<template>
    <div class="mb-5">
        <div class="text-center">
            <h1>Kalenders</h1>
        </div>
        <div v-if="kalenders.length > 0">
            <kalender-list :kalenders="kalenders"></kalender-list>
            <div class="text-center mt-3">
                <button class="btn btn-primary" @click.prevent="meerKalendersLaden" v-if="next_page_url">Meer kalenders ...</button>
            </div>
        </div>
        <div class="text-center" v-else>
            <ul class="list-group">
                <li class="list-group-item">
                    Geen kalender(s) aanwezig!
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import ViewCard from "../components/ViewCard";
    import KalenderList from "../components/kalenders/KalenderList";

    export default {
        name: "Kalenders",
        components: {
            ViewCard,
            KalenderList,
        },
        data() {
            return {
                kalenders: [],
                next_page_url: ""
            }
        },
        methods: {
            meerKalendersLaden() {
                axios.get(this.next_page_url)
                    .then(
                        response => {
                            console.log(response.data);
                            response.data.data.forEach(
                                kalender => this.kalenders.push(kalender)
                            )
                            this.next_page_url = response.data.links.next;
                        }
                    );
            }
        },
        created() {
            axios.get("/api/kalenders")
                .then(
                    response => {
                        console.log(response.data);
                        this.kalenders = response.data.data;
                        this.next_page_url = response.data.links.next;
                    }
                );
        }
    }
</script>

<style scoped>

</style>

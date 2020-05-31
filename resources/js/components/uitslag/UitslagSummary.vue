<template>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mb-2 shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start">
                            <span>Aantal Deelnemers</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span v-text="aantalDeelnemers"></span>
                        </div>
                    </h5>
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start">
                            <span>Totaal gewicht</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span v-text="totaalGewicht"></span>
                        </div>
                    </h5>
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start">
                            <span>Gemiddeld gewicht</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span v-text="gemiddeldGewicht"></span>
                        </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UitslagSummary",
        props: [
            'aantalDeelnemers', 'totaalGewicht' , 'gemiddeldGewicht'
        ]
    }
</script>

<style scoped>

</style>

<template>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mb-2 shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title">
                        <span class="mr-3" style="color: #2FA4E7;">
                            <i class="fas fa-weight-hanging"></i>
                        </span>
                        <span class="mr-3" v-text="uitslag.volgorde"></span>
                        <span class="mr-3" v-text="uitslag.str_gewicht"></span>
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex justify-content-start">
                            <span class="mr-3" v-text="uitslag.deelnemers"></span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span v-text="uitslag.plaatsen"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UitslagItem",
        props: [
            'uitslag'
        ]
    }
</script>

<style scoped>

</style>

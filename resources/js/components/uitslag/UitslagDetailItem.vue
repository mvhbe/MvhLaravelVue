<template>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card mb-2 shadow-sm">
                <div class="card-body ">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start">
                            <span class="mr-3" v-text="uitslagDetail.volgorde"></span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="mr-3" v-text="uitslagDetail.gewicht"></span>
                            <span style="color: #2FA4E7;">
                                <i class="fas fa-weight-hanging"></i>
                            </span>
                        </div>
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex justify-content-start">
                            <span class="mr-3" v-text="uitslagDetail.deelnemers"></span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span v-text="uitslagDetail.plaatsen"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UitslagDetailItem",
        props: [
            'uitslagDetail'
        ]
    }
</script>

<style scoped>

</style>

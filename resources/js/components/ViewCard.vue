<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-3 shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    {{ header }}
                </div>
                <div class="card-body mx-3">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViewCard",
        props: ['header'],
    }
</script>

<style scoped>

</style>

<template>

        <div class="index">

            <div class="myPage">


                <router-view></router-view>


            </div>

        </div>


</template>

<script>
    export default {
        name: "index",
        created() {
            this.$store.dispatch('checkRole')
        }
    }
</script>

<style scoped>

</style>

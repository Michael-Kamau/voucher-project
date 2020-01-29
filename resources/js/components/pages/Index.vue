<template>

        <div class="index">

            <div class="container">


                <router-view></router-view>


            </div>

        </div>


</template>

<script>
    import router from "../../router";
    export default {

        name: "index",
        created() {
            this.$store.dispatch('checkRole')
        },
        // mounted(){
        //     router.push('/allVouchers')
        // }
    }
</script>

<style scoped>

</style>

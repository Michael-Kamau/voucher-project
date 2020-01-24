<template>
    <nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
        <div class="container">
            <a href="#" class="navbar-brand">User Dashboard</a>
        </div>
        <div class="navbar">
            <ul class="menu">

                <li v-if="true"><a><router-link to="/allVouchers">All Vouchers</router-link></a></li>
                <li v-if="true"><a><router-link to="/myVouchers">My Vouchers</router-link></a></li>
                <li v-if="true"><a><router-link to="/redeemedVouchers">Redeemed</router-link></a></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "NavBar"
    }
</script>

<style scoped>

</style>

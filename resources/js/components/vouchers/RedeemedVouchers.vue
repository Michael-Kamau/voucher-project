<template>
<div class="redeemedVouchers">
    <h2>Redeemed Vouchers</h2>
    <div class="myTable">

        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Expiry Date</th>

            </tr>
            </thead>
            <tr v-for="voucher in this.$store.getters.getMyRedeemed" :key="voucher.id">
                <td>{{voucher.id}}</td>
                <td>{{voucher.code}}</td>
                <td>{{voucher.amount}}</td>
                <td>{{voucher.status}}</td>
                <td>{{voucher.expiry_date}}</td>
            </tr>
        </table>

    </div>
</div>
</template>

<script>
    export default {
        name: "RedeemedVouchers",
        mounted() {
            this.$store.dispatch('getRedeemedVouchers')
        }
    }
</script>

<style scoped>

</style>

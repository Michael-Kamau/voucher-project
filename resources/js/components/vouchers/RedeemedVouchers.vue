<template>
<div class="redeemedVouchers">
    <h2>Redeemed Vouchers</h2>
    <div class="myTable">

<!--        <table>-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Id</th>-->
<!--                <th>Code</th>-->
<!--                <th>Amount</th>-->
<!--                <th>Status</th>-->
<!--                <th>Expiry Date</th>-->

<!--            </tr>-->
<!--            </thead>-->
<!--            <tr v-for="voucher in this.$store.getters.getMyRedeemed" :key="voucher.id">-->
<!--                <td>{{voucher.id}}</td>-->
<!--                <td>{{voucher.code}}</td>-->
<!--                <td>{{voucher.amount}}</td>-->
<!--                <td>{{voucher.status}}</td>-->
<!--                <td>{{voucher.expiry_date}}</td>-->
<!--            </tr>-->
<!--        </table>-->



        <table class="table-responsive">
            <thead>
            <tr>
                <th class="w-1/9 px-4 py-2">Id</th>
                <th class="w-2/9 px-4 py-2">Code</th>
                <th class="w-2/9 px-4 py-2">Amount</th>
                <th class="w-2/9 px-4 py-2">Status</th>
                <th class="w-2/9 px-4 py-2">Expiry Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="voucher in this.$store.getters.getMyRedeemed" :key="voucher.id">
                <td class="border px-3 py-2">{{voucher.id}}</td>
                <td class="border px-4 py-2">{{voucher.code}}</td>
                <td class="border px-4 py-2">{{voucher.amount}}</td>
                <td class="border px-4 py-2">{{voucher.status}}</td>
                <td class="border px-4 py-2">{{voucher.expiry_date}}</td>

            </tr>
            </tbody>
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

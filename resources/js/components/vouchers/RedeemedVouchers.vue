<template>
<div class="redeemedVouchers">
    <h2>Redeemed Vouchers</h2>
    <div class="myTable" v-if="this.$store.getters.getMyRedeemed.length">
        <table class="table-responsive">
            <thead>
            <tr>
                <th class="w-1/9 px-4 py-2">Id</th>
                <th class="w-2/9 px-4 py-2">Code</th>
                <th class="w-2/9 px-4 py-2">Amount</th>
                <th class="w-2/9 px-4 py-2">Status</th>
                <th class="w-2/9 px-4 py-2">Product</th>
                <th class="w-2/9 px-4 py-2">Expiry Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="voucher in this.$store.getters.getMyRedeemed" :key="voucher.id">
                <td class="border px-3 py-2">{{voucher.id}}</td>
                <td class="border px-4 py-2">{{voucher.code}}</td>
                <td class="border px-4 py-2">{{voucher.amount}}</td>
                <td class="border px-4 py-2">{{voucher.status}}</td>
                <td class="border px-4 py-2">{{voucher.type}}</td>
                <td class="border px-4 py-2">{{voucher.expiry_date}}</td>

            </tr>
            </tbody>
        </table>

    </div>
    <div v-else class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
         role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Notification</p>
                <p class="text-sm">You do Not Have Any Redeemed Vouchers</p>
            </div>
        </div>
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

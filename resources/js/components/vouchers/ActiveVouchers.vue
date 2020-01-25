<template>
    <div class="allVouchers">
        <h2>All Vouchers</h2>
        <div class="myTable">

            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Expiry Date</th>
                    <th>Buy</th>
                </tr>
                </thead>
                <tr v-for="voucher in this.$store.getters.getAllVouchers" :key="voucher.id">
                    <td>{{voucher.id}}</td>
                    <td>{{voucher.code}}</td>
                    <td>{{voucher.amount}}</td>
                    <td>{{voucher.expiry_date}}</td>
                    <td><button @click="buyVoucher(voucher.id)">Buy Voucher</button></td>
<div class="main">
    here is the main reason as to i will not be able to make it to the meeting
</div>

                </tr>

            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "ActiveVouchers.vue",
        methods:{
            buyVoucher(voucherId){
                this.$store.dispatch('buyVoucher',{'voucher_id':voucherId});
            }
        },
        mounted() {
            this.$store.dispatch('getAllVouchers');
        }
    }
</script>

<style scoped>

</style>

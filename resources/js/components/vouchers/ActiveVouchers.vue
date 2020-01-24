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
                    <td><button>Buy Voucher</button></td>


                </tr>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "ActiveVouchers.vue",
        mounted() {
            this.$store.dispatch('getAllVouchers');
        }
    }
</script>

<style scoped>

</style>

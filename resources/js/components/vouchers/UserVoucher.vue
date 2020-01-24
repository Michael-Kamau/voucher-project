<template>
<div class="myVouchers">
    <h2>My vouchers</h2>
    <div class="myTable">

        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Expiry Date</th>
                <th>Redeem</th>
                <th>Give Voucher</th>
                <th>Give</th>

            </tr>
            </thead>
            <tr v-for="voucher in this.$store.getters.getAllVouchers" :key="voucher.id">
                <td>{{voucher.id}}</td>
                <td>{{voucher.code}}</td>
                <td>{{voucher.amount}}</td>
                <td>{{voucher.status}}</td>
                <td>{{voucher.expiry_date}}</td>
                <td><button>Redeem</button></td>
                <td><input type="email" name="email" placeholder="email address"><br></td>
                <td><button :click="giveVoucher()">Give</button></td>


            </tr>
        </table>

    </div>
</div>
</template>

<script>
    export default {
        name: "UserVoucher.vue",
        methods:{
            giveVoucher(id){

            }
        },
        mounted() {
            this.$store.dispatch('getMyVouchers');
        }
    }
</script>

<style scoped>

</style>

<template>
<div class="myVouchers">
    <h2>My vouchers</h2>
    <div class="myTable">

<!--        <table>-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Id</th>-->
<!--                <th>Code</th>-->
<!--                <th>Amount</th>-->
<!--                <th>Status</th>-->
<!--                <th>Expiry Date</th>-->
<!--                <th>Redeem</th>-->
<!--                <th>Give Voucher</th>-->
<!--                <th>Give</th>-->

<!--            </tr>-->
<!--            </thead>-->
<!--            <tr v-for="voucher in this.$store.getters.getMyVouchers" :key="voucher.id">-->
<!--                <td>{{voucher.id}}</td>-->
<!--                <td>{{voucher.code}}</td>-->
<!--                <td>{{voucher.amount}}</td>-->
<!--                <td>{{voucher.status}}</td>-->
<!--                <td>{{voucher.expiry_date}}</td>-->
<!--                <td><button @click="redeemVoucher(voucher.id)">Redeem</button></td>-->
<!--                <td><input type="email" name="email" placeholder="email address"><br></td>-->
<!--                <td><button @click="giveVoucher()">Give</button></td>-->
<!--            </tr>-->
<!--        </table>-->

        <table class="table-fixed">
            <thead>
            <tr>
                <th class="w-1/2 px-4 py-2">ID</th>
                <th class="w-1/4 px-4 py-2">Code</th>
                <th class="w-1/4 px-4 py-2">Amount</th>
                <th class="w-1/4 px-4 py-2">Status</th>
                <th class="w-1/4 px-4 py-2">Expiry Date</th>
                <th class="w-1/4 px-4 py-2">Redeem</th>
                <th class="w-1/4 px-4 py-2">Give Voucher</th>
                <th class="w-1/4 px-4 py-2">Give</th>


            </tr>
            </thead>
            <tbody>
            <tr v-for="voucher in this.$store.getters.getMyVouchers" :key="voucher.id">

                <td class="w-1/2 px-4 py-2">{{voucher.id}}</td>
                <td class="w-1/2 px-4 py-2">{{voucher.code}}</td>
                <td class="w-1/2 px-4 py-2">{{voucher.amount}}</td>
                <td class="w-1/2 px-4 py-2">{{voucher.status}}</td>
                <td class="w-1/2 px-4 py-2">{{voucher.expiry_date}}</td>
                <td class="w-1/2 px-4 py-2"><button @click="redeemVoucher(voucher.id)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Redeem</button></td>
                <td class="w-1/2 px-4 py-2"><input type="email" name="email" placeholder="email address"><br></td>
                <td class="w-1/2 px-4 py-2"><button @click="giveVoucher()" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Give</button></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
</template>

<script>
    export default {
        name: "UserVoucher.vue",
        methods:{
            giveVoucher(id){

            },
            redeemVoucher(id){
                this.$store.dispatch('redeemVoucher',{'voucher':id})
            }
        },
        mounted() {
            this.$store.dispatch('getMyVouchers');
        }
    }
</script>

<style scoped>

</style>

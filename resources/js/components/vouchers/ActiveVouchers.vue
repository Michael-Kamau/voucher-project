<template>
    <div class="allVouchers">
        <h2>All Vouchers</h2>
        <div class="myTable">

            <!--            <table>-->
            <!--                <thead>-->
            <!--                <tr>-->
            <!--                    <th>Id</th>-->
            <!--                    <th>Code</th>-->
            <!--                    <th>Amount</th>-->
            <!--                    <th>Expiry Date</th>-->
            <!--                    <th>Buy</th>-->
            <!--                </tr>-->
            <!--                </thead>-->
            <!--                <tr v-for="voucher in this.$store.getters.getAllVouchers" :key="voucher.id">-->
            <!--                    <td>{{voucher.id}}</td>-->
            <!--                    <td>{{voucher.code}}</td>-->
            <!--                    <td>{{voucher.amount}}</td>-->
            <!--                    <td>{{voucher.expiry_date}}</td>-->
            <!--                    <td>-->
            <!--                        <button @click="buyVoucher(voucher.id)">Buy Voucher</button>-->
            <!--                    </td>-->

            <!--                </tr>-->

            <!--            </table>-->

            <table class="table-fixed">
                <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2">ID</th>
                    <th class="w-1/4 px-4 py-2">Code</th>
                    <th class="w-1/4 px-4 py-2">Amount</th>
                    <th class="w-1/4 px-4 py-2">Expiry Date</th>
                    <th class="w-1/4 px-4 py-2">Buy</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="voucher in this.$store.getters.getAllVouchers" :key="voucher.id">
                    <td class="border px-4 py-2">{{voucher.id}}</td>
                    <td class="border px-4 py-2">{{voucher.code}}</td>
                    <td class="border px-4 py-2">{{voucher.amount}}</td>
                    <td class="border px-4 py-2">{{voucher.expiry_date}}</td>
                    <td class="border px-4 py-2">
                        <button @click="buyVoucher(voucher.id)" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Buy Voucher</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <buyModal></buyModal>

        </div>
    </div>
</template>

<script>
    import buyModal from "./BuyModal.vue";

    export default {
        name: "ActiveVouchers.vue",
        components: {buyModal},
        data() {
            return {
                showModal: false
            }

        },
        methods: {
            buyVoucher(voucherId) {
                this.$store.dispatch('buyVoucher', {'voucher_id': voucherId});
            }
        },
        mounted() {
            this.$store.dispatch('getAllVouchers');
        }
    }
</script>

<style scoped>

</style>

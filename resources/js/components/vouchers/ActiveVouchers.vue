<template>
    <div class="allVouchers">
        <h2>All Vouchers</h2>
        <div class="myTable" v-if="this.$store.getters.getAllVouchers.length">
            <table class="table-responsive  "  >
                <thead>
                <tr>
                    <th class="w-1/5 px-2 py-2">Voucher Code</th>
                    <th class="w-1/5 px-2 py-2">Voucher Product</th>
                    <!--                    <th class="w-1/5 px-4 py-2">Code</th>-->
                    <th class="w-1/5 px-2 py-2">Amount</th>
                    <th class="w-1/5 px-2 py-2">Expiry Date</th>
                    <th class="w-1/5 px-2 py-2">Buy</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="voucher in this.$store.getters.getAllVouchers" :key="voucher.id">
                    <td class="border px-2 py-2">{{voucher.code}}</td>
                    <td class="border px-2 py-2">{{voucher.type}}</td>
                    <td class="border px-2 py-2">Ksh.{{voucher.amount}}</td>

                    <td class="border px-2 py-2">{{voucher.expiry_date}}</td>
                    <td class="border px-2 py-2">
                        <button @click="show(voucher.id,voucher.code)"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Buy Voucher
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <!--            <buyModal></buyModal>-->
        </div>
        <div v-else class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert" >
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Notification</p>
                    <p class="text-sm">No Vouchers Available currently</p>
                </div>
            </div>
        </div>

        <div class="myModal">
            <div>

                <!--        <button @click="buyVoucher(voucher.id)" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Buy Voucher</button>-->
                <modal v-on:buy="buyVoucher()" name="buy-modal" @before-open="beforeOpen" :adaptive="true" :height="430"
                       :width="400"
                       v-bind:vouchers="vouchers">
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert" v-if="wait">
                        <p class="font-normal">Processing Transaction...</p>
                    </div>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" v-if="error">
                        <p class="font-bold">Please Fill All the fields</p>
                    </div>
                    <form class="w-full max-w-sm p-6">
                        <div class="md:flex-row  mb-6">
                            <div class="">
                                <label class="block mt-4">
                            <span
                                class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Payment Method</span>
                                    <select class="form-select mt-1 block w-full" v-model="vouchers.method">
                                        <option>M-Pesa</option>
                                        <option>Bank</option>
                                        <option>Cash on Delivery</option>
                                    </select>
                                </label>
                                <div class="md:flex-row md:items-left mb-6">
                                    <div class="">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                                               for="inline-number">
                                            Transaction Code(Fill CASH for COD)
                                        </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                            id="inline-number" type="text" placeholder="M-Pesa/Bank"
                                            v-model="vouchers.transactionCode">
                                    </div>
                                </div>
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                                       for="inline-code">
                                    Voucher Code
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input readonly
                                       class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                       id="inline-code" type="text" placeholder="AQJKYSHY" v-model="vouchers.code">
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button
                                    class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="button" @click="buyVoucher()" v-bind:class="{canBuy: 'cursor-not-allowed'}">
                                    Purchase
                                </button>
                            </div>
                        </div>
                    </form>

                </modal>
            </div>
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
                showModal: false,
                vouchers: {},
                wait:false,
                error:null
            }

        },
        computed:{
            canBuy(){
                if(this.vouchers.code==null || this.vouchers.transactionCode ==null || this.vouchers.method==null){
                    return false
                }else{
                    return true
                }
            }

        },
        methods: {
            // buyVoucher(voucherId) {
            //
            //     this.$store.dispatch('buyVoucher', {'voucher_id': voucherId});
            // },
            buyVoucher() {
                this.error=null
                if(this.vouchers.code==null || this.vouchers.transactionCode ==null || this.vouchers.method==null){
                    this.error=true
                }else{
                    console.log(this.vouchers)
                    this.wait=true
                    this.$store.dispatch('buyVoucher', this.vouchers)
                        .then(response =>{
                            this.$modal.hide('buy-modal');
                            this.vouchers={}
                            this.wait=false
                        })
                }


            },
            show(id, code) {

                this.vouchers.id = id
                this.vouchers.code = code
                this.$modal.show('buy-modal', this.vouchers);
            },
            hide() {
                this.vouchers = {}
                this.$modal.hide('buy-modal');
            },
            beforeOpen(event) {
                console.log(event.params)

            }
        },
        mounted() {
            this.$store.dispatch('getAllVouchers');
        }
    }
</script>

<style scoped>


</style>

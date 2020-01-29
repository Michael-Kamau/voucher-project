<template>
    <div class="myVouchers">
        <h2>My vouchers</h2>
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mb-3" role="alert"
             v-if="wait">
            <p class="font-bold">Please wait</p>
            <p>Processing...</p>
        </div>
        <div class="myTable" v-if="this.$store.getters.getMyVouchers.length">
            <table class="table-responsive">
                <thead>
                <tr>
                    <th class="w-1/10 px-1 py-2">ID</th>
                    <th class="w-1/10 px-4 py-2">Code</th>
                    <th class="w-1/10 px-4 py-2">Amount</th>
                    <th class="w-2/10 px-1 py-2">Expiry Date</th>
                    <th class="w-1/10 px-4 py-2">Redeem</th>
                    <th class="w-1/10 px-4 py-2">Give</th>
                    <th class="w-1/10 px-4 py-2">Given To</th>


                </tr>
                </thead>
                <tbody>
                <tr v-for="voucher in this.$store.getters.getMyVouchers" :key="voucher.id">

                    <td class="w-1/10 px-1 py-2">{{voucher.id}}</td>
                    <td class="w-1/10 px-4 py-2">{{voucher.code}}</td>
                    <td class="w-1/10 px-4 py-2">{{voucher.amount}}</td>
                    <td class="w-2/10 px-1 py-2">{{voucher.expiry_date}}</td>
                    <td class="w-1/10 px-4 py-2">
                        <button @click="redeemVoucher(voucher.id)"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Redeem
                        </button>
                    </td>
                    <td class="w-1/10 px-4 py-2">
                        <button @click="show(voucher.id)"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Give
                        </button>
                    </td>
                    <td class="w-1/10 px-4 py-2">{{voucher.email}}</td>
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
                    <p class="text-sm">You do Not Have Any Active Vouchers</p>
                </div>
            </div>
        </div>

        <modal v-on:buy="" name="give-modal" @before-open="beforeOpen" :adaptive="true" :height="200" :width="400"
               v-bind:details="details">
            <!--                    <h1>code{{foo}}</h1>-->
            <form class="w-full max-w-sm p-6">
                <div class="md:flex-row  mb-6">
                    <p v-if="wait">Processing...</p>
                    <div class="">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                               for="inline-code">
                            Recipient's Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-code" type="text" placeholder="email" v-model="details.email">
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="button" @click="giveVoucher()">
                            Give
                        </button>
                    </div>
                </div>
            </form>

        </modal>

    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "UserVoucher.vue",
        data() {
            return {
                details: {},
                voucher: {},
                wait: null
            }
        },
        methods: {
            giveVoucher() {
                if (this.details.email != null) {
                    this.wait = true
                    return new Promise((resolve, reject) => {
                        console.log(this.details)
                        axios.post(`/api/voucher/give`, this.details)
                            .then(response => {
                                console.log(response.data)
                                this.$store.dispatch('getMyVouchers')
                                this.$modal.hide('give-modal');
                            }).catch(e => {
                            //this.errors.push(e)
                            console.log(e)
                        }).then(response => {
                            this.wait = null
                        })
                    })

                }


            },
            redeemVoucher(id) {
                this.wait = true
                this.$store.dispatch('redeemVoucher', {'voucher': id})
                    .then(response => {
                        this.wait = false
                    })
            },
            show(id) {

                this.details.id = id
                this.$modal.show('give-modal', this.vouchers);
            },
            hide() {
                this.vouchers = {}
                this.$modal.hide('give-modal');
            },
            beforeOpen(event) {
                console.log(event.params)

            }
        },
        mounted() {
            this.$store.dispatch('getMyVouchers');
        }
    }
</script>

<style scoped>

</style>

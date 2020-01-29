<template>
    <div class="unclaimedVouchers ">
        <h2>Unclaimed Vouchers</h2>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" v-if="error">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Incorrect details Provided.</span>

        </div>

        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert" v-if="success">
            <p class="font-bold">Success</p>
            <p class="text-sm">You have Successfully claimed your voucher. You can view it in your vouchers page</p>
        </div>
        <div>
            <form class="w-full max-w-sm p-6">
                <div class="md:flex-row  mb-6">
                    <div class="">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                               for="inline-code">
                            Voucher code
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-code" type="number" placeholder="Voucher Code" v-model="voucher.voucher">
                    </div>
                </div>
                <div class="md:flex-row  mb-6">
                    <div class="">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                               for="inline-verification">
                            Verification code
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-verification" type="number" placeholder="Verification Code"
                            v-model="voucher.verification">
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="button" @click="claimVoucher()">
                            Claim
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "UnclaimedVouchers.vue",
        data() {
            return {
                error: null,
                success: null,
                voucher: {}
            }

        },
        methods: {
            claimVoucher() {
                this.success=null

                if (this.voucher.voucher !== null && this.voucher.verification) {
                    axios.post(`/api/voucher/claim`, this.voucher)
                        .then(response => {
                            console.log(response.data)
                            this.$store.dispatch('getMyVouchers')
                            this.error = null
                            this.success="success"
                            this.voucher={}
                        }).catch(e => {
                        this.error = "Incorrect Details"
                        console.log(e)
                    })
                }

            }
        }

    }
</script>

<style scoped>

</style>

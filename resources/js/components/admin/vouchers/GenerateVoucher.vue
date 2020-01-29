<template>
    <div class="generateVoucher">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" v-if="error">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Incorrect details Provided.</span>

        </div>

        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert" v-if="success">
            <p class="font-bold">Success</p>
            <p class="text-sm">You have Successfully claimed your voucher. You can view it in your vouchers page</p>
        </div>

        <h2>Generate Vouchers</h2>
        <form class="w-full max-w-sm">
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-amount">
                        Voucher Amount
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-amount" type="text" placeholder="Price of Vouchers" v-model="form.amount">
                </div>
            </div>
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-number">
                        Voucher Number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-number" type="text" placeholder="Number of Vouchers" v-model="form.number">
                </div>
            </div>
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-number">
                        Voucher Expiry date
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-expiry" type="date" placeholder="Number of Vouchers" v-model="form.expiry">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="button" @click="generateVouchers">
                        Generate
                    </button>
                </div>
            </div>
        </form>
    </div>

</template>

<script>
    export default {
        name: "generate",
        data() {
            return {
                form: {}
            }

        },
        methods: {
            generateVouchers() {
                this.$store.dispatch('generateVouchers', this.form)
                this.success="success"
                this.voucher={}
            },
        },
        created() {
            this.$store.dispatch('checkRole');
        },
        mounted() {
            if (!this.$store.getters.getIfAdmin) {
                this.$router.push('/')
            }
        }
    }
</script>

<style scoped>

</style>

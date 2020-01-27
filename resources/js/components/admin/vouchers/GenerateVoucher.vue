<template>
    <div class="generateVoucher">
<!--        <form enctype="multipart/form-data">-->
<!--            Amount To Pay for Voucher:<br>-->
<!--            <input type="number" name="amount" v-model="form.amount"><br>-->
<!--            Number of Vouchers to Generate:<br>-->
<!--            <input type="number" name="number" v-model="form.number"><br>-->
<!--            Expiry Date<br>-->
<!--            <input type="date" name="expiry" v-model="form.expiry"><br>-->
<!--            <div class="row">-->
<!--                <input type="button" value="Generate Vouchers" @click="generateVouchers">-->
<!--            </div>-->
<!--        </form>-->
        Generate Vouchers
        <form class="w-full max-w-sm">
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-amount">
                        Voucher Amount
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-amount" type="text" placeholder="Price of Vouchers" v-model="form.amount">
                </div>
            </div>
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-number">
                        Voucher Number
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-number" type="text" placeholder="Number of Vouchers" v-model="form.number">
                </div>
            </div>
            <div class="md:flex md:items-left mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-number">
                        Voucher Expiry date
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-expiry" type="date" placeholder="Number of Vouchers" v-model="form.expiry">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" @click="generateVouchers">
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
                //this.$store.dispatch('generateVouchers',this.form)
                // this.$router.go('https://www.facebook.com')
                window.location.href = "/logout"
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

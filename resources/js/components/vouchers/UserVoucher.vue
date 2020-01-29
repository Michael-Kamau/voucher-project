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
                <th class="w-1/12 px-1 py-2">ID</th>
                <th class="w-1/12 px-4 py-2">Code</th>
                <th class="w-1/12 px-4 py-2">Amount</th>
                <th class="w-1/12 px-4 py-2">Status</th>
                <th class="w-1/12 px-4 py-2">Pay Code</th>
                <th class="w-3/12 px-1 py-2">Expiry Date</th>
                <th class="w-1/12 px-4 py-2">Redeem</th>
                <th class="w-1/12 px-4 py-2">Give</th>
                <th class="w-1/12 px-4 py-2">Given To</th>


            </tr>
            </thead>
            <tbody>
            <tr v-for="voucher in this.$store.getters.getMyVouchers" :key="voucher.id">

                <td class="w-1/12 px-1 py-2">{{voucher.id}}</td>
                <td class="w-1/12 px-4 py-2">{{voucher.code}}</td>
                <td class="w-1/12 px-4 py-2">{{voucher.amount}}</td>
                <td class="w-1/12 px-4 py-2">{{voucher.status}}</td>
                <td class="w-1/12 px-4 py-2">{{voucher.payment_code}}</td>
                <td class="w-4/12 px-1 py-2">{{voucher.expiry_date}}</td>
                <td class="w-1/12 px-4 py-2"><button @click="redeemVoucher(voucher.id)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Redeem</button></td>
                <td class="w-1/12 px-4 py-2"><button @click="show(voucher.id)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Give</button></td>
                <td class="w-1/12 px-4 py-2">{{voucher.email}}</td>
            </tr>
            </tbody>
        </table>

    </div>

    <modal v-on:buy="" name="give-modal" @before-open="beforeOpen" :adaptive="true" :height="200" :width="400"
            v-bind:details="details">
        <!--                    <h1>code{{foo}}</h1>-->
        <form class="w-full max-w-sm p-6">
            <div class="md:flex-row  mb-6">
                <div class="">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4"
                           for="inline-code">
                        Recipient's Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                           class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-code" type="text" placeholder="email" v-model="details.email" >
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
        data(){
            return{
                details:{}
            }
        },
        methods:{
            giveVoucher(){
                if(this.details.email!=null){
                    console.log(this.details)
                    axios.post(`/api/voucher/give`,this.details)
                        .then(response => {
                            console.log(response.data)
                            this.$store.dispatch('getMyVouchers')
                            this.$modal.hide('give-modal');
                        }).catch(e => {
                        //this.errors.push(e)
                        console.log(e)
                    })
                }


            },
            redeemVoucher(id){
                this.$store.dispatch('redeemVoucher',{'voucher':id})
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

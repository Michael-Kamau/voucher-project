<template>
    <div class="AdminPage">
        <h2>Users</h2>
        <table class="table-responsive" v-if="!userVouchers.length">
            <thead>
            <tr>
                <th class="w-1/5 px-1 py-2">ID</th>
                <!--                    <th class="w-1/5 px-4 py-2">Code</th>-->
                <th class="w-1/5 px-2 py-2">Name</th>
                <th class="w-1/5 px-2 py-2">Email</th>
                <th class="w-1/5 px-2 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td class="border px-2 py-2">{{user.id}}</td>
                <!--                    <td class="border px-4 py-2">{{voucher.code}}</td>-->
                <td class="border px-2 py-2">{{user.name}}</td>
                <td class="border px-2 py-2">{{user.email}}</td>
                <td class="border px-2 py-2">
                    <button @click="userData(user.id)"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        View
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="user-details" v-if="userVouchers.length">
            <button @click="hideDetails()"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Back to Users
            </button>
            <table class="table-responsive">
                <thead>
                <tr>
                    <th class="w-1/5 px-1 py-2">Voucher Code</th>
                    <!--                    <th class="w-1/5 px-4 py-2">Code</th>-->
                    <th class="w-1/5 px-2 py-2">Voucher Status</th>
                    <th class="w-1/5 px-2 py-2">Payment Method</th>
                    <th class="w-1/5 px-2 py-2">Payment Code</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="voucher in userVouchers" :key="voucher.id">
                    <td class="border px-2 py-2">{{voucher.code}}</td>
                    <!--                    <td class="border px-4 py-2">{{voucher.code}}</td>-->
                    <td class="border px-2 py-2">{{voucher.status}}</td>
                    <td class="border px-2 py-2">{{voucher.payment_method}}</td>
                    <td class="border px-2 py-2">{{voucher.payment_code}}</td>
                </tr>
                </tbody>
            </table>

        </div>

    </div>

</template>

<script>
    import adminNavbar from "../includes/NavBar.vue";
    import axios from "axios";

    export default {
        name: "AdminPage.vue",
        data() {
            return {
                users: {},
                userVouchers: {}
            }
        },
        components: {},
        methods: {
            userData(id) {
                axios.get(`/userVouchers/` + id)
                    .then(response => {
                        console.log(response.data)
                        this.userVouchers = response.data.data
                    }).catch(e => {
                    //this.errors.push(e)
                    console.log(e)
                })
            },
            hideDetails() {
                this.userVouchers = {}
            }

        },

        mounted() {
            axios.get(`/users/all`)
                .then(response => {
                    console.log(response.data)
                    this.users = response.data.data
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        }

    }
</script>

<style scoped>

</style>

<template>

    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <i class="fas fa-ticket-alt"></i> &nbsp; &nbsp;
            <span class="font-semibold text-xl tracking-tight">Cytonn Vouchers</span>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    <router-link to="/allVouchers">All Vouchers</router-link>
                </a>
                <a  class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    <router-link to="/myVouchers">My Vouchers</router-link>
                </a>
                <a  class="block mt-4 lg:inline-block lg:mt-0 text-white-200 hover:text-white mr-4">
                    <router-link to="/redeemedVouchers">Redeemed</router-link>
                </a>
                <a  class="block mt-4 lg:inline-block lg:mt-0 text-white-200 hover:text-white">
                    <router-link to="/claim">Claim Voucher</router-link>
                </a>


            </div>
            <div >
                <a v-if="this.$store.getters.getIfAdmin"href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"><router-link to="/admin">Users</router-link></a>
                <a v-if="this.$store.getters.getIfAdmin"href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"><router-link to="/generate">Generate Vouchers</router-link></a>
                <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0" @click="logout">Logout</a>
            </div>
        </div>
    </nav>


</template>

<script>
    export default {
        name: "NavBar",
        methods:{
            logout(){
                window.location.href = "/logout"
            }
        }
    }
</script>

<style scoped lang="scss">
    .bg-teal-500 {
        background-color: #3863b2;
    }
    main{
        padding-top: 0px;
    }

    a{
        color: white;
    }
</style>

import Router from 'vue-router'
import Vue from 'vue'


import Index from '../components/pages/Index.vue'
import ErrorPage from "../components/pages/ErrorPage.vue";
import UserVoucher from "../components/vouchers/UserVoucher.vue";
import RedeemedVouchers from "../components/vouchers/RedeemedVouchers.vue";
import ActiveVouchers from "../components/vouchers/ActiveVouchers";

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes: [
        {
            path: '/',
            name: 'app',
            component: Index,
            children: [
                {
                    path: 'allVouchers',
                    name: 'allVouchers',
                    component: ActiveVouchers
                },
                {
                    path: 'myVouchers',
                    name: 'myVouchers',
                    component: UserVoucher
                },
                {
                    path: 'redeemedVouchers',
                    name: 'redeemedVouchers',
                    component: RedeemedVouchers
                }
            ]
        },

        {
            path: '*',
            name: 'error',
            component: ErrorPage
        }]
})

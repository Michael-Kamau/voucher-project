import Router from 'vue-router'
import Vue from 'vue'


import Index from '../components/pages/Index.vue'
import ErrorPage from "../components/pages/ErrorPage.vue";
import ActiveVouchers from "../components/vouchers/ActiveVouchers";
import UserVoucher from "../components/vouchers/UserVoucher";
import RedeemedVouchers from "../components/vouchers/RedeemedVouchers.vue"
import AdminPage from "../components/admin/pages/AdminPage.vue";
import GenerateVoucher from "../components/admin/vouchers/GenerateVoucher.vue";

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
                    // UserProfile will be rendered inside User's <router-view>
                    // when /user/:id/profile is matched
                    path: 'allVouchers',
                    component: ActiveVouchers
                },
                {
                    // UserPosts will be rendered inside User's <router-view>
                    // when /user/:id/posts is matched
                    path: 'myVouchers',
                    component: UserVoucher
                },
                {
                    // UserPosts will be rendered inside User's <router-view>
                    // when /user/:id/posts is matched
                    path: 'redeemedVouchers',
                    component: RedeemedVouchers
                },
                {
                    // UserPosts will be rendered inside User's <router-view>
                    // when /user/:id/posts is matched
                    path: 'admin',
                    component: AdminPage
                },
                {
                    // UserPosts will be rendered inside User's <router-view>
                    // when /user/:id/posts is matched
                    path: 'generate',
                    component: GenerateVoucher
                }
            ]

        },

        {
            path: '*',
            name: 'error',
            component: ErrorPage
        }]
})

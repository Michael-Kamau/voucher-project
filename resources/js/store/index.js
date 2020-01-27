import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        token:null,
        allVouchers:null,
        myVouchers:null,
        myRedeemedVouchers:null,
        admin:null

    },

    getters: {
        getAllVouchers(state){
            return state.allVouchers
        },
        getMyVouchers(state){
            return state.myVouchers
        },
        getMyRedeemed(state){
            return state.myRedeemedVouchers
        },
        getIfAdmin(state){
            return state.admin
        }




    },

    actions: {
        retrieveToken(state, payload) {
            return new Promise((resolve, reject) => {
                axios.post(`http://localhost:5000/api/login`, payload)
                    .then(response => {
                        console.log(response.data)
                        const token = response.data.token
                        localStorage.setItem('access_token', token)
                        state.commit('retrieveToken', token)
                        resolve(response)
                    }).catch(e => {
                    reject(e)

                    //this.errors.push(e)
                    console.log(e)
                })
            })


        },


        getAllVouchers(state) {
            axios.get(`/api/voucher/`)
                .then(response => {
                    console.log(response.data)
                    let vouchers = response.data
                    state.commit('getAllVouchers', vouchers)
                }).catch(e => {
                console.log(e)
            })


        },
        getMyVouchers(state) {
            axios.get(`/api/voucher/bought`)
                .then(response => {
                    console.log(response.data)
                    let vouchers = response.data
                    state.commit('getMyVouchers', vouchers)
                }).catch(e => {
                console.log(e)
            })


        },
        getRedeemedVouchers(state) {
            axios.get(`/api/voucher/redeemed`)
                .then(response => {
                    console.log(response.data)
                    let vouchers = response.data
                    state.commit('getRedeemedVouchers', vouchers)
                }).catch(e => {
                console.log(e)
            })


        },
        buyVoucher(state,payload){
            axios.post(`/api/voucher/buy`,payload)
                .then(response => {
                    console.log(response.data)
                   state.dispatch('getAllVouchers')
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })

        },
        giveVoucher(state,payload){
            axios.post(`/api/voucher/give`,payload)
                .then(response => {
                    console.log(response.data)
                    state.dispatch('getMyVouchers')
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        },
        redeemVoucher(state,payload){
            axios.post(`/api/voucher/redeem`,payload)
                .then(response => {
                    console.log(response.data)
                    state.dispatch('getMyVouchers')
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        },
        checkRole(state){
            axios.get(`/user/role`)
                .then(response => {
                    console.log(response.data)
                    state.commit('checkRole',response.data)
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        },
        generateVouchers(state, payload){
            console.log(payload)
            axios.post(`/api/voucher/generate`,payload)
                .then(response => {
                    console.log(response.data)
                    // state.dispatch('getAllVouchers')
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        },


    },

    mutations: {

        retrieveToken(state, payload) {
            state.token = payload
        },
        destroyToken(state) {
            state.token = null
        },
        login(state, payload) {
            axios.post(`http://localhost:5000/login`, payload)
                .then(response => {
                    console.log(response.data)
                    this.state.show = response.data.shows
                }).catch(e => {
                //this.errors.push(e)
                console.log(e)
            })
        },
        getAllVouchers(state,payload) {
            state.allVouchers=payload.data
        },
        getMyVouchers(state,payload) {
            state.myVouchers=payload.data
        },
        getRedeemedVouchers(state,payload) {
            state.myRedeemedVouchers=payload.data
        },

        checkRole(state,payload){
            state.admin=payload
        }

    }
})

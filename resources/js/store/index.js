import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        token:null,
        allVouchers:null,
        myVouchers:null

    },

    getters: {
        getAllVouchers(state){
            return state.allVouchers
        },
        getMyVouchers(state){
            return state.myVouchers
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

        loggedIn(state) {
            return state.token != null
        },
        destroyToken(state) {
            if (state.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    axios.post(`http://localhost:5000/api/logout`)
                        .then(response => {
                            localStorage.removeItem('access_token')
                            state.commit('destroyToken')
                            resolve(response)
                        }).catch(e => {
                        localStorage.removeItem('access_token')
                        state.commit('destroyToken')
                        reject(e)

                        //this.errors.push(e)
                        console.log(e)
                    })
                })


            }
        },

        getAllVouchers(state) {
            axios.get(`/api/voucher/`)
                .then(response => {
                    console.log(response.data)
                    let vouchers = response.data
                    state.commit('getAllVouchers', vouchers)
                    resolve(response)
                }).catch(e => {
                console.log(e)
            })


        },
        getMyVouchers(state) {
            axios.get(`/api/voucher/1`)
                .then(response => {
                    console.log(response.data)
                    let vouchers = response.data
                    state.commit('getMyVouchers', vouchers)
                    resolve(response)
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
        }


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
            state.allVouchers=payload.data
        },

    }
})

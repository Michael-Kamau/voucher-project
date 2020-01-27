// src/pluginsVue/vuetify.js

import Vue from 'vue'
import Vuetify from '../../../node_modules/vuetify'
// import 'vuetify/lib/components/'
// import 'vuetify/src/stylus/app.styl1'

Vue.use(Vuetify)

const opts = {
// icons: {
//         iconfont: 'md',  // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
//     },
//     theme: {
//         dark: false,
//     },
//     themes: {
//         light: {
//             primary: "#4682b4",
//             secondary: "#b0bec5",
//             accent: "#8c9eff",
//             error: "#b71c1c",
//         },
//     },
}

export default new Vuetify({
    iconfont:'md'
})

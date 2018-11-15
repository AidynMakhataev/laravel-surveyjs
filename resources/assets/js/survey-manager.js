require("./base")

window.Vue = require("vue")

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css' 
import VueRouter from 'vue-router'
import App from './App'
import router from './router'
Vue.use(VueRouter)
Vue.use(Vuetify)

new Vue({
    router,
    data () {
        return {
            snackbar: false,
            snackbarMsg: ''
        }
    },
    render: h => h(App)
}).$mount('#survey-manager')

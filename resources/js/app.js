require('./bootstrap');


import {createApp} from 'vue'
import Flash from './components/Flash'

const app = createApp({})
app.component('flash', Flash)
app.mount('#app')

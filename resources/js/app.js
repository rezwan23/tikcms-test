require('./bootstrap');

import { createApp } from 'vue'
import Hello from './components/Hello.vue'

const app = createApp({})
app.component('Hello', Hello)

app.mount('#app')

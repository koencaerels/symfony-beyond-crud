import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'

// -- prime icons
import 'primeicons/primeicons.css'

// -- prime vue + components
import PrimeVue from 'primevue/config'
import PrimeOne from 'primevue/themes/primeone'
import Aura from 'primevue/themes/primeone/aura'
import Button from 'primevue/button'

const app = createApp(App)

app.use(createPinia())

// -- prime vue + components
app.use(PrimeVue, {
  theme: {
    base: PrimeOne,
    preset: Aura,
    options: {
      prefix: 'p',
      darkModeSelector: '.app-dark',
      cssLayer: false
    }
  }
})
app.component('Button', Button)

app.mount('#app')

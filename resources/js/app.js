import './bootstrap'

import * as bootstrap from 'bootstrap'

import {createApp} from 'vue';

import avaluacioAlumnes from './components/autoavaluacioAlumnes.vue'

createApp(avaluacioAlumnes).mount('#autoavaluacio')

import avaluacioProfe from './components/autoavaluacioProfe.vue'

createApp(avaluacioProfe).mount('#autoavaluacioProfe')
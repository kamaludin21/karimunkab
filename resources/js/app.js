import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import './modal.js';
import { share } from './share'

window.share = share
Alpine.plugin(focus)
window.Alpine = Alpine
Alpine.start()

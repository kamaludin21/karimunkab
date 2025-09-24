import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import './modal.js';
import { shareFacebook } from './share';

window.shareFacebook = shareFacebook;
Alpine.plugin(focus)
window.Alpine = Alpine
Alpine.start()

// Babel Polyfill
// Important that this is first
import '@babel/polyfill';

// CSS Imports 💄
// --------------------------------------------------------------------------
import '../sass/app.scss';


// Vendor Imports 📦
// --------------------------------------------------------------------------
// e.g.
import Vue from 'vue';

// Component Imports 🏗
// --------------------------------------------------------------------------

// Vanilla
import StickyHeader from './app/StickyHeader';
import MainMenu from './app/MainMenu';

// App kickoff 🚀
// --------------------------------------------------------------------------

(function() {
    new StickyHeader();
    new MainMenu();
})();

// Import Vue Components
import DataSearch from './app/components/DataSearch.vue';
import ModalWindow from './app/components/ModalWindow.vue';

// Initialise vue components
Vue.component('data-search', DataSearch);
Vue.component('modal-window', ModalWindow);

// Mount vue
new Vue({
    el: '#app'
});

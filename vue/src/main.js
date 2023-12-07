// src/store/index.js
import { createApp } from 'vue';
import App from './App.vue';
import store from './store';
import 'toastr/build/toastr.min.css';
import toastr from 'toastr'; 

// Create your Vue app instance
const app = createApp(App);

// Use toastr as a global property
app.config.globalProperties.$toastr = toastr;

// Configure toastr (you can customize these options)
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: 'toast-top-right',
    preventDuplicates: true,
    onclick: null,
    showDuration: '300',
    hideDuration: '1000',
    timeOut: '5000',
    extendedTimeOut: '1000',
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
  };

// Use the Vuex store
app.use(store);

// Mount the app
app.mount('#app');



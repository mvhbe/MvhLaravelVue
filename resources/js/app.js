import router from "./router";
import Index from "./Index";

require('./bootstrap');
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    router,
    components: {
        Index
    },
});

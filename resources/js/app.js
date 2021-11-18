require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('mail-form', require('./components/MailForm').default);

var app = new Vue({
    el: "#app",
    data: {
        form: {
            name: '',
            email: '',
            text: ''
        },
        list: [],
        page: 1
    },
    methods: {

    },
    mounted() {

    }
})

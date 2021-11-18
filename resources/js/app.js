require('./bootstrap');

import Vue from 'Vue';

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
        loadMails: function() {
            console.log(1);
        },
        createMail: function ()
        {

        }
    },
    mounted() {
        this.loadMails();
    }
})

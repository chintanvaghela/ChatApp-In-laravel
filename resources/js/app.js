/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        users: [],
        messages: [],
        message: "",
        me: 0,
        you: 0
    },
    mounted() {
        this.loadmessages();
        this.loadusers();
    },
    methods: {
        loadusers() {
            axios.get('/api/users')
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    // handle error
                    console.log(error);
                })
                .finally(() => {
                    // always executed
                });
        },
        add() {
            if (!this.message == '') {
                axios.post('/api/message', {
                    sender_id: this.me,
                    message: this.message,
                    reciver_id: this.you
                })
                    .then(response => {
                        this.messages.push(response.data);
                    })
                    .catch(error => {
                        // handle error
                        console.log(error);
                    })
                    .finally(() => {
                        this.message = '';
                    });
            }
        }
        ,
        loadmessages() {
            this.messages=[];
            // Make a request for a user with a given ID
            if(!(this.me == 0 && this.you == 0)){
            axios.get(`/api/users/${this.me}/${this.you}`)
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    // handle error
                    console.log(error);
                })
                .finally(() => {
                    // always executed
                });
        }
    }
    }
});

Echo.private(`home.${app.me}`)
    .listen('NewMessage', e => {
        app.messages.push(e.message);
    });

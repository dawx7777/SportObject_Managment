const { default: axios } = require('axios');
const { data } = require('jquery');

require('./bootstrap');


window.Vue = require('vue');
window._=require('lodash');
window.$=window.jQuery=require('jquery');



Vue.component('reservation', require('./components/ReservationNotification.vue'));
const app=new Vue({

    el: '#app',
    data: {
        reservations:'',
    },
    created(){
        if(window.Laravel.userId){
            axios.get('/notification/reservation/notification').then(response=>{

                this.reservations=response.data;
                console.log(response.data)
            });
            Echo.private('App.User.' +window.Laravel.userId).notification((response)=>{
                data={"data":response};
                this.reservations.push(data);
                console.log(response);
            })
        }
    }
})

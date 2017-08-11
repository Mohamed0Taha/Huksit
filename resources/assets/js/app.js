
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 new Vue({
  el: '#app',
  
  mounted(){
    axios.get('/ajax_url').then(response=>console.log(response.data));

   
    }
});
 import vPikaday from 'vue-pikaday'
Vue.use(vPikaday)

  new Vue({
   data () {
     return { date: null }
   }
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
var Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('contactform', require('./components/contactform.vue'));
Vue.component('riderstable', require('./components/riderstable.vue'));
Vue.component('messagestable', require('./components/messagestable.vue'));
Vue.component('userstable', require('./components/userstable.vue'));
Vue.component('newstable', require('./components/newstable.vue'));
Vue.component('rostertable', require('./components/rosterstable.vue'));
Vue.component('userriderstable', require('./components/userriderstable.vue'));
Vue.component('settingstable', require('./components/settingstable.vue'));
Vue.component('announcements', require('./components/announcements.vue'));
Vue.component('adminannouncementstable', require('./components/adminannouncements.vue'));
Vue.component('my-riderstable', require('./components/myriders.vue'));
Vue.component('birthdaytable', require('./components/birthdaytable.vue'));

const app = new Vue({
    el: 'body',
});

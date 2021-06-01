/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueI18n from 'vue-i18n'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(VueI18n)
Vue.use(ElementUI)

import store from './store'

import en from '../lang/en.json'
import ru from '../lang/ru.json'
import ua from '../lang/ua.json'

const messages = {
    en : en,
    ru : ru,
    ua : ua
}

const i18n = new VueI18n({
    locale: locale,
    messages,
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app', require('./components/App.vue').default);
Vue.component('personal-info', require('./components/Tabs/PersonalInfo').default);
Vue.component('objectives', require('./components/Tabs/Objectives').default);
Vue.component('experience', require('./components/Tabs/Experience').default);
Vue.component('education', require('./components/Tabs/Education').default);
Vue.component('generic', require('./components/Tabs/Generic').default);
Vue.component('bullets', require('./components/Fields/Bullets').default);
Vue.component('skills', require('./components/Fields/Skills').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    i18n
});

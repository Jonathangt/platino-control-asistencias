require('./bootstrap');

import Vue from "vue";
import App from "./components/App";
import router from "./router";
import VueRouter from "vue-router";

import vSelect from "vue-select";
import 'vue-select/dist/vue-select.css';

import moment from 'moment';
import toast from "vue-toastification";
import "vue-toastification/dist/index.css";
//import store from './vueX/store'


Vue.use(toast, {
  transition: "Vue-Toastification__bounce",
  maxToasts: 1,
  newestOnTop: false,
  filterBeforeCreate: (toast, toasts) => {
    if (toasts.filter(
      t => t.type === toast.type
    ).length !== 0) {
      return false;
    }
    return toast;
  }
});

Vue.component("v-select", vSelect);
Vue.prototype.moment = moment;
Vue.use(VueRouter);


Vue.component("menuComponente",require("./components/MenuComponent.vue").default);

new Vue({
    el: "#app",
    //store,
    components: {
        App,
    },
    router
})

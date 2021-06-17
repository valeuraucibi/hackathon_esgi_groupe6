import Vue from "vue";
import App from "./App.vue";
import { router } from "./routes";
import store from "./store";
import axios from "axios";
import 'leaflet/dist/leaflet.css';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import 'materialize-css/dist/css/materialize.min.css';
import 'material-design-icons/iconfont/material-icons.css';

Vue.config.productionTip = false;
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.interceptors.response.use(
    response => response,
    error => {
        console.log("error", error);
        if (error.response.status === 422) {
            store.commit("setErrors", error.response.data.errors);
        } else if (error.response.status === 401) {
            store.commit("auth/setUserData", null);
            localStorage.removeItem("authToken");
            router.push({ name: "Login" });
        } else {
            return Promise.reject(error);
        }
    }
);

axios.interceptors.request.use(function(config) {
    // console.log("[main] intercept", store.getters.getToken);
    config.headers.common = {
        Authorization: `${store.getters.getToken}`,
        "Content-Type": "application/json",
        Accept: "application/json"
    };

    return config;
});

new Vue({
    router,
    render: h => h(App)
}).$mount("#app");
import Vue from "vue";
import VueRouter from "vue-router";

import routesArr from "./routes.js";

Vue.use(VueRouter);

const guest = (to, from, next) => {
    if (!localStorage.getItem("token")) {
      return next();
    } else {
      return next("/");
    }
  };
const auth = (to, from, next) => {
    if (localStorage.getItem("token")) {
      return next();
    } else {
      return next("/login");
    }
};
let routesInit = routesArr.map((route)=>{
  if(route.roles && route.roles.includes("anonyme")) route.beforeEnter = guest;
  if(route.roles && (route.roles.includes("ROLE_ADVERTISER") || route.roles.includes("ROLE_PUBLISHER"))) route.beforeEnter = auth;
  return route;
});

const routerInit = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: routesInit
});

export let router = routerInit;



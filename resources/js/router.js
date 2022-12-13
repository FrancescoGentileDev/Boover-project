import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            alias: "/home",
            name: "home",
            component: () => import("./views/homeView.vue"),
        },
        {
          path: "/profile",
          name: "profile",
          component: () => import('./views/ProfileView.vue'),
        }
    ],
});

export default router;

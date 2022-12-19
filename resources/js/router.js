import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            alias: ["/home", "/skill"],

            name: "home",
            component: () => import("./views/homeView.vue"),
        },
        {
            path: "/ourteam",
            name: 'team',
            component: () => import('./views/ourTeamView.vue'),
        },
        {
          path: "/profile/:slug",
          name: "profile",
          component: () => import('./views/ProfileView.vue'),
      },
        {
          path: "/search",
          name: "search",
          component: () => import('./views/searchView.vue'),
      },
      {
        path: "/skill/:slug",
        name: 'skill',
        component: () => import('./views/skillView.vue')
        },
        {
          path: "/allusers",
          name: "allusers",
          component: () => import('./views/AllUsersView.vue'),
        },
        {
            path: "/*",
            name: 'notFound',
            component: () => import('./views/notFoundView.vue')

        }
    ],
});

export default router;

import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "reservations",
    component: () => import("../views/Reservations/Index.vue"),
  },
  {
    path: "/in-dev",
    name: "En desarrollo",
    component: () => import("../views/InDev.vue"),
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;

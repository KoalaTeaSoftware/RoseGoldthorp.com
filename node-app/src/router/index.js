import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomePage.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView
    },
    {
      path: "/about",
      name: "about",
      component: () => import("../views/AboutPage.vue")
    },
    {
      path: "/released-features",
      name: "released-features",
      component: () => import("../views/ReleasedFeatures.vue")
    },
    {
      path: "/released-features/films/:slug",
      name: "film-detail",
      component: () => import("../views/FilmDetail.vue"),
      props: true
    },
    {
      path: "/period-brit-lit",
      name: "period-brit-lit",
      component: () => import("../views/PeriodBritLit.vue")
    },
    {
      path: "/contact",
      name: "contact",
      component: () => import("../views/ContactPage.vue")
    }
  ]
});

export default router;

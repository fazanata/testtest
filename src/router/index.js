import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import beginTest from "../views/beginTest.vue";
import Category from "../views/Category.vue";
import Result from "../views/Result.vue";
import Section from "../views/Section.vue";
import Cat from "../views/Cat.vue";


Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue"),
  },
  {
    path: "/beginTest",
    name: "beginTest",
    component: beginTest,
  },
  {
    path: "/category",
    name: "Category",
    component: Category,
  },
  {
    path: "/result",
    name: "Result",
    component: Result,
  },
  {
    path: "/section",
    name: "Section",
    component: Section,
  },
  {
    path: "/cat",
    name: "Cat",
    component: Cat,
  }
];

const router = new VueRouter({
  mode: "history",
  routes,
});

export default router;

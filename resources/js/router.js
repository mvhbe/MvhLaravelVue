import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: ExampleComponent
    }
];

const router = new VueRouter(
    {
        mode: "history",
        routes,
    }
);

export default router;

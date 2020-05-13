import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "./views/HomeView";
import KalendersView from "./views/KalendersView";
import KalenderWedstrijdenView from "./views/KalenderWedstrijdenView";
import UitslagenView from "./views/UitslagenView";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeView
    },
    {
        path: "/kalenders",
        name: "kalenders",
        component: KalendersView
    },
    {
        path: "/kalenders/:jaar/wedstrijden",
        name: "kalenderwedstrijden",
        component: KalenderWedstrijdenView
    },
    // {
    //     path: "/uitslagen",
    //     name: "uitslagen",
    //     component: UitslagenView
    // },
];

const router = new VueRouter(
    {
        mode: "history",
        routes,
    }
);

export default router;

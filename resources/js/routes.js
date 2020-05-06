import HomeView from "./views/HomeView";
import AboutView from "./views/AboutView";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: HomeView
        },
        {
            path: '/about',
            component: AboutView
        }
    ]
};


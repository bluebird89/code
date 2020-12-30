import Page1 from "@/pages/Page1";
import Page2 from "@/pages/Page2";
import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

export default new Router({
    routes: [{
        path: '/page1',
        name: 'Page1',
        component: Page1
    },
    {
        path: '/page2',
        name: 'Page2',
        component: Page2
    }
    ]
})

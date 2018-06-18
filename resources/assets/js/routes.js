import VueRouter from 'vue-router';

let routes = [

    {
        path: 'test',
        component: require('./components/TestRouterComponent.vue')
    }

];

export default new VueRouter({
    routes
});
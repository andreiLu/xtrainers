require('./bootstrap')

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const User = {template: '<div>{{ $route.params.username }}</div>'}

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        // {path: '/', component: Home},
        // {path: '/about', component: require('./components/TestRouterComponent')},
        // {
        //     path: '/users', component: Users,
        //     children: [
        //         {path: ':username', name: 'user', component: User}
        //     ]
        // },
        {path: '/ask-question', component: require('./components/NewQuestionComponent')},
        {path: '/home', component: require('./components/HomeComponent')},
        {path: '/search', component: require('./components/SearchComponent')},
    ]
})

new Vue({
    router,
    el: '#app'
})
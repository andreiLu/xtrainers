require('./bootstrap')

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// const User = {template: '<div>{{ $route.params.username }}</div>'}

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
        // {path: '/ask-question', component: require('./components/NewQuestionComponent')},
        // {path: '/home', component: require('./components/HomeComponent')},
        // {path: '/search', component: require('./components/SearchComponent')},
        // {path: '/question', component: require('./components/QuestionsListComponent')},
        // {path: '/calendar', component: require('./components/CalendarComponent')},
    ]
})

//new Vue({
//    router,
//    el: '#app'
//})

/**
 * Document ready actions
 */
$(document).ready(function () {
    $('.user-type').on('click', function () {
        $('input[name="user_type"]').val($(this).attr('name'));
    });

    /**
     * Hide and show currency options
     */
    $('#class_type').on('change', function () {
        if ($(this).val() === 'credits') {
            $('.credits-price').show();
            $('.money-price').hide();
        } else if ($(this).val() === 'money') {
            $('.credits-price').hide();
            $('.money-price').show();
        } else {
            $('.credits-price').hide();
            $('.money-price').hide();
        }
    })

});
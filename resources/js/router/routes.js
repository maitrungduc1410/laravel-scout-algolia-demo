import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
    // base: '/app',
    linkActiveClass: 'active',
	routes: [
	    // { path: '/', redirect: '/pages' },
	    {
	      path: '/',
	      name: 'search',
	      component: require('../components/Search.vue')
	    },
    ]
})

export default router
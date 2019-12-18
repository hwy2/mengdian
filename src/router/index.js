import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/Home',
    name: 'home',
    component: Home
  },
  {
    path: '/Assort',
    name: 'assort',
    component: () => import('../views/Assort.vue')
  },
  {
    path: '/ShopCart',
    name: 'shopCart',
    component: () => import('../views/ShopCart.vue')
  },
  {
    path: '/Me',
    name: 'me',
    component: () => import('../views/Me.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router

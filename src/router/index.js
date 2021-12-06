import Vue from 'vue'
import VueRouter from 'vue-router'
import Citas from '../views/citas.vue'
import Mascotas from '../views/mascotas.vue'

Vue.use(VueRouter)

const routes = [
  {
    path:'/citas/',
    name:'citas',
    component: Citas
  },
  {
    path:'/mascotas/',
    name:'mascotas',
    component: Mascotas
  }, 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

//    component: function () {
//  return import(/* webpackChunkName: "about" */ '../views/About.vue')
//}
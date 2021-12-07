import Vue from 'vue'
import VueRouter from 'vue-router'
import Pelicula from '../views/pelicula.vue'
import Actor from '../views/actor.vue'
import Boleto from '../views/boletos.vue'
import Horario from '../views/horario.vue'
import Funcion from '../views/funcion.vue'

Vue.use(VueRouter)

const routes = [
  {
    path:'/pelicula/',
    name:'pelicula',
    component: Pelicula
  },
  {
    path:'/actor/',
    name:'actor',
    component: Actor
  },  
  {
    path:'/boleto/',
    name:'boleto',
    component: Boleto
  },    
  {
    path:'/horario/',
    name:'horario',
    component: Horario
  },  
  {
    path:'/funcion/',
    name:'funcion',
    component: Funcion
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
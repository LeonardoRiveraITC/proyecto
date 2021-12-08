import Vue from 'vue'
import VueRouter from 'vue-router'
import Pelicula from '../views/pelicula.vue'
import Actor from '../views/actor.vue'
import Boleto from '../views/boletos.vue'
import Horario from '../views/horario.vue'
import Funcion from '../views/funcion.vue'
import AdmActor from '../views/admactor.vue'
import AdmEntrada from '../views/admentrada.vue'
import AdmFuncion from '../views/admfuncion.vue'
import AdmHorario from '../views/admhorario.vue'
import AdmPelicula from '../views/admpelicula.vue'
import AdmCine from '../views/cine.vue'
import AdmDirector from '../views/director.vue'
import AdmGenero from '../views/genero.vue'
import AdmPais from '../views/pais.vue'
import AdmPersonaje from '../views/personaje.vue'
import AdmProductora from '../views/productora.vue'
import AdmProgramacion from '../views/programacion.vue'
import AdmReparto from '../views/reparto.vue'
import AdmRol from '../views/rol.vue'
import AdmSala from '../views/sala.vue'

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
  {
    path:'/admactor/',
    name:'admactor',
    component: AdmActor
  },      
  {
    path:'/admentrada/',
    name:'admentrada',
    component: AdmEntrada
  },
  {
    path:'/admfuncion/',
    name:'admfuncion',
    component: AdmFuncion
  },
  {
    path:'/admhorario/',
    name:'admhorario',
    component: AdmHorario
  },
  {
    path:'/admpelicula/',
    name:'admpelicula',
    component: AdmPelicula
  },
  {
    path:'/admcine/',
    name:'admcine',
    component: AdmCine
  },
  {
    path:'/admdirector/',
    name:'admdirector',
    component: AdmDirector
  },
  {
    path:'/admentrada/',
    name:'admentrada',
    component: AdmEntrada
  },
  {
    path:'/admgenero/',
    name:'admgenero',
    component: AdmGenero
  },
  {
    path:'/admpais/',
    name:'admpais',
    component: AdmPais
  },
  {
    path:'/admpersonaje/',
    name:'admpersonaje',
    component: AdmPersonaje
  },
  {
    path:'/admproductora/',
    name:'admproductora',
    component: AdmProductora
  },
  {
    path:'/admprogramacion/',
    name:'admprogramacion',
    component: AdmProgramacion
  },
  {
    path:'/admreparto/',
    name:'admreparto',
    component: AdmReparto
  },
  {
    path:'/admrol/',
    name:'admrol',
    component: AdmRol
  },
  {
    path:'/admsala/',
    name:'admsala',
    component: AdmSala
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
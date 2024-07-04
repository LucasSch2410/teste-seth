import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CreateContacts from '../views/CreateContacts.vue'
import EditContacts from '../views/EditContacts.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/contatos/criar',
        name: 'criar',
        component: CreateContacts
    },
    {
        path: '/contatos/:id/editar',
        name: 'editar',
        component: EditContacts
    },
  ]
})

export default router

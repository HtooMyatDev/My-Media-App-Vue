import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomePage.vue'),
    },
    {
      path: '/homePage',
      name: 'HomePage',
      component: () => import('../views/HomePage.vue'),
    },
    {
      path: '/newsDetails/:postsId',
      name: 'newsDetails',
      props: true,
      component: () => import('../views/newsDetail.vue'),
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: () => import('../views/LoginPage.vue'),
    },
  ],
})

export default router

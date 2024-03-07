// Router
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
// GENERAL
import './style.scss'
import App from './App.vue'
// Routs
import Home from './components/Home.vue'
import Tags from './components/Tags.vue'
import About from './components/About.vue'

// createApp(App).mount('#app')

const routes = [
    { path: '/', component: Home },
    { path: '/tags', component: Tags },
    { path: '/about', component: About }
]

const router = createRouter({
history: createWebHistory(),
routes
})

createApp(App).use(router).mount('#app')
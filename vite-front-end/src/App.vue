<script setup>
import { useRouter } from 'vue-router'
const router = useRouter()

import Home from './components/Home.vue'
import Tags from './components/Tags.vue'
import About from './components/About.vue'

</script>

<template>
  <div id="app">
    <router-link to="/">Home</router-link> |
    <router-link to="/tags">Tags</router-link> |
    <router-link to="/about">About</router-link>
    <router-view></router-view>
  </div>
</template>

<style lang="scss">

</style>

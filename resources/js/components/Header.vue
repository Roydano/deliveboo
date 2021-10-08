<template>
    <header class="my-3">
        <!-- <ul class="nav justify-content-center">
            <li class="nav-item mx-5" v-for="(link, index) in nav" :key="index">
              <router-link :to="{name: link.routeName}">
                {{link.label}}
              </router-link>
            </li>
        </ul> -->
        prova header
    </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
      return {
        nav: [
          {
            label: 'Home',
            routeName: 'home',
          }
        ]
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
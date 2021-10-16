<template>
    <header>
        <Cart/>
        <router-link v-for="item in nav" :key="item.label" :to="item.path" class="link">{{item.label}}</router-link>
    </header>
</template>

<script>
import Cart from '../components/Cart';


export default {
    name: 'Header',

    
    components: {
        Cart,
    },
   
    data() {
      return {
        nav: [
          {
            label: 'Ristoranti',
            path: '/restaurants',
          },
          {
            label: 'Cousines',
            path: '/cuisines',
          },
        ]
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
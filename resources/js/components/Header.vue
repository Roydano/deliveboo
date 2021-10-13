<template>
    <header>
        <Cart/>
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
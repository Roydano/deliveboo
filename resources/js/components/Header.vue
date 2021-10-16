<template>
    <header>
        
        
          <router-link class="logo ml-3" to="/"><img src="/storage/img/welogo.svg" alt="wanna eat"></router-link>

        <router-link v-for="item in nav" :key="item.label" :to="item.path" class="link">{{item.label}}</router-link>

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
  header {
    height: 80px;
    background-color: red;
    display: flex;
    align-items: center;
    justify-content: space-around;
    .link {
      text-transform: uppercase;
      font-weight: 200;
      font-size: 1.5rem;
    }
    .logo img {
        width: 8rem;
        transition: all .2s linear;
        &:hover {
            transform: rotateZ(360deg);
        }
    }
  }
</style>
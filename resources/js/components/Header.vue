<template>
    <header>
        
        
          <router-link class="logo ml-3" to="/"><img src="/storage/img/welogo.svg" alt="wanna eat"></router-link>

        <router-link v-for="item in nav" :key="item.label" :to="item.path" class="link">{{item.label}}</router-link>

        <Cart />

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
    z-index: 1;
    position: fixed;
    padding-right: 30%;
    width: 100%;
    height: 80px;
    background-color: rgba($color: #000000, $alpha: 0);
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: white;
    .link {
      width: 100%;
      text-align: center;
      text-transform: uppercase;
      font-weight: 200;
      font-size: 1.2rem;
      color: white;
      text-decoration: none;
      font-weight: 300;
      transition: all .2s linear;
        &:hover {
            transform: scale(1.1);
        }
    }
    .logo img {
        width: 8rem;
        filter: invert(1);
        transition: all .3s linear;
        &:hover {
            transform: rotateZ(360deg);
        }
    }
  }
</style>
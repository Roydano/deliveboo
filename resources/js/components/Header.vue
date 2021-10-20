<template>
    <header>
        
      <div class="left d-flex flex-column">

        <router-link class="logo ml-3" to="/"><img src="/storage/img/welogo.svg" alt="wanna eat"></router-link>

        <router-link v-for="item in nav" :key="item.label" :to="item.path" class="link ml-3 mt-3">{{item.label}}</router-link>

      </div>

        <Cart class="mt-5"/>

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
        cuisines: "",
        nav: [
          {
            label: 'Ristoranti',
            path: '/restaurants',
          }
       
        ]
    }
    },
    mounted(){
        this.getCuisines();

        
    },
    methods: {
        getCuisines() {
            axios.get("http://localhost:8000/api/cuisines")
                .then( response => {
                    this.cuisines = response.data.results;
                    

                } )
                .catch(error => {
                    console.log(error);
                });
        },
}
}
</script>

<style lang="scss" scoped>
  header{
    z-index: 4;
    position: fixed;
    background-color: rgba($color: #000000, $alpha: 0);
    display: flex;
    color: white;
  }

    .link {
      text-align: center;
      text-transform: uppercase;
      font-weight: 200;
      font-size: 1.2rem;
      color: white;
      opacity:0.6;
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
  

  .link:hover{
    opacity:1; 
  }


    

  
</style>
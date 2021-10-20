<template>
<div id="cuisines" class="sfondo position-absolute">

    <div class="container h-100 d-flex align-content-center justify-content-center">

    <div class="row justify-content-center align-items-center">

    <div class="cucine ml-3 mt-5 text-center">

          <span class="link ">Le nostre cucine</span>

          <ul>
            <li v-for="cuisine in cuisines" :key="cuisine.id">
              <router-link :to="{name: 'cuisine', params: { slug: cuisine.slug}}" class="betw">
                
                <span class="link cucina">{{cuisine.name}}</span>
              </router-link>
            </li>
          </ul>

    </div>

    </div>

    </div>
  

</div>

</template>

<script>

import CardRestaurant from '../components/CardRestaurant';

export default {
    name: 'ShowcaseRestaurant',
    components:{
        CardRestaurant
    },

    data() {
        return {
            apiCall: 'http://localhost:8000/api/cuisines',
            cuisines: [],
            cuisineSelect: "",
            restaurants: [],
            classActive: 'attiva',
            classNotActive: 'notActive'
            
        }
    },

    created(){
        this.getCuisines();

        
    },


    methods: {
        getCuisines() {
            axios.get(this.apiCall)
                .then( response => {
                    this.cuisines = response.data.results;
                    

                } )
                .catch(error => {
                    console.log(error);
                });
        },

        getCuisine(cuisine){
            console.log(cuisine);
            this.cuisineSelect = cuisine;
        },

        getRestaurant(cuisine) {
        axios.get("/api/cuisines/" + cuisine)
        .then((response) => {
            this.restaurants = response.data.results.data;

        });
      
        },
     
    }

}
</script>

<style lang="scss" scoped>
* {
    font-family: Montserrat !important;
}
.cucine {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-family: Montserrat;
}

.betw {
    padding: 1.3vw;
}

.link {
    text-transform: uppercase;
      font-weight: 200;
      font-size: 2rem;
      color: white;
      opacity:0.8;
}
 
 a:hover {
     text-decoration: none;
 }
.cucina {
        text-transform: capitalize;
        font-size: 1.7rem;
        font-weight: 100;
        padding: .8vw;

        &:hover {
            font-size: 2rem;
            background: rgba(255, 255, 255, 0.219);
            text-decoration: none;
        }
        
    }
.sfondo {
    width: 100%;
    top: 0;
    position: absolute;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.4) 20%, rgba(0,0,0,0.7) 100%);
    height: 100%;
    z-index: 3;
    }
.cuc {
    width: 85%;
    }

.attiva{
    background-color: white;
    span{
        color:black;
    }

}

.notActive{
   background-color:rgba(0, 0, 0, 0.4);
}

.sect{
    text-align:center;
}



// }
h2{
    
    font-style:italic;
    margin:auto;
    display:flex;
    justify-content: center;
    justify-content: center;
     
     padding: 10px;
     width:400px;

}
p{
    color:white;
    font-style:italic;
    font-size:20px;
}

.container-fluid{
    padding-top:6rem;
}

.cartella{
   
    text-align: center;
}

 .bottone:hover{
     background-color:rgb(229, 226, 226);
        transition: 0.8s ;
     
    

 }
.bottone:hover span{
    color:black;
     transition: 0.5s ease-in-out;
     transition-property: color;
    

}












.card-title p{
    color:white;
    text-decoration: none;
    font-style:italic;
}


// .card-cucina{
//     margin-left:50px;
//     background: url('/img/black-food.jpg');
//     background-size: cover;
    
    
    
// }
p span{
    color:white;
    font-style:italic;
}

 .chefame{
     padding:75px 0 ;
 }

.ciao{
    height:200px;
}



  







</style>
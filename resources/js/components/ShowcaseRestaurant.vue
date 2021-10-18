<template>
<div class="sfondo ">
    <h2> Tutte le nostre cucine</h2>
     <div class="container-fluid ">
        <div class="row">
           
            
            <div class="col-lg-2 col-md-2 col-sm-4 sect" v-for="cuisine in cuisines" :key="cuisine.id" >
                 <p class="bottone btn " @click="getCuisine(cuisine.slug); getRestaurant(cuisine.slug);" :value="cuisine.id"> <span class="cusname">{{ cuisine.name }}</span> </p> 
         
            </div>
            
        </div>

       <div class="row sezione ">
           <div class="chefame">
               <CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"/>
               <div class="ciao">
                   
               </div>

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
            restaurants: []
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

.sect{
    text-align:center;
}

.sfondo{
     
      height: auto;
       background:url('/img/ao.jpg');
       background-size:cover;
       padding-top:30px;
       
}


// @media screen and (max-height: 700px) {
//   .sfondo{
//    height:200vh;
//   }
// }
h2{
    filter: drop-shadow(16px 16px 20px red) invert(75%);
    
    font-style:italic;
    margin:auto;
    display:flex;
    justify-content: center;
    justify-content: center;
     color:red;
     
     
     padding: 10px;
     width:400px;

}
p{
    color:white;
    font-style:italic;
    font-size:20px;
}

.container-fluid{
    margin-top:50px;
    font-style:italic;
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
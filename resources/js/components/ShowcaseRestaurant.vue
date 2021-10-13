<template>
<div class="sfondo">
    <h2>Le nostre cucine</h2>
        <div class="container-fluid">
        <div class="row">
           
            
            <div class="  col cartella" v-for="cuisine in cuisines" :key="cuisine.id" >
                 <p class="bottone btn " @click="getCuisine(cuisine.slug); getRestaurant(cuisine.slug);" :value="cuisine.id"> <span>{{ cuisine.name }}</span> </p> 
         
            </div>
            
        </div>

        <div class="row sezione">
            
            
                  <div class="card card-cucina" style="width: 28rem;"      >
                    
                      <div class="card-body">
                         
                        
                         <div class="card-title">
                            <p class="card-text"  ><CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"    /></p> 
                         </div>
                        
                      </div>
                </div>  

            



                <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <p class="card-text"><CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"/></p> 
      
    </div>
    <div class="carousel-item">
        <p class="card-text"><CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"/></p> 
     
    </div>
    <div class="carousel-item">
     
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->

               

               
        

      

    











           
                  
            
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
            this.restaurants = response.data.results;
        });
    },
    }

}
</script>

<style lang="scss" scoped>

.sfondo{
    //  background: url('img/food-sfondo.jpg');
    height:100vh;
    background:lightgray;
}
h2{
    padding-top:15px;
   margin-left:30px;
}

.container-fluid{
    margin-top:50px;
}

.cartella{
   
    text-align: center;
}

 .bottone:hover{
     background-color:black;
        transition: 0.8s ;
     
    

 }
.bottone:hover span{
    color:white;
       transition: 0.5s ease-in-out;
     transition-property: color;
    

}
.card-title p{
    color:white;
    text-decoration: none;
}


.card-cucina{
    margin-left:50px;
    background: url('/img/black-food.jpg');
    background-size: cover;
    
    
    
}








</style>
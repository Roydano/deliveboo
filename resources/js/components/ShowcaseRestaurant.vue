<template>
<div id="cuisines" class="sfondo position-md-absolute">
     <div class="container-fluid d-flex flex-column">

        <div class="col row row-cols-4 row-cols-md-6 row-cols-lg-12 cuc align-self-end">
           
            
            <div class="col sect" v-for="cuisine in cuisines" :key="cuisine.id" >
                 <p :class="[ cuisine.slug === cuisineSelect ? classActive : classNotActive ]"   class="bottone btn " @click="getCuisine(cuisine.slug); getRestaurant(cuisine.slug); " :value="cuisine.id"  > <span class="cusname"   >{{ cuisine.name }}</span> </p> 
                  
            </div>
            
        </div>

       <div class="col row sezione ">
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
.sfondo {
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
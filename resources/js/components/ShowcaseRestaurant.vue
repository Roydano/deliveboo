<template>
    <div class="container">
        <div class="row">
            
            <div class="col" v-for="cuisine in cuisines" :key="cuisine.id" >
                <p @click="getCuisine(cuisine.slug); getRestaurant(cuisine.slug);" :value="cuisine.id">{{ cuisine.name }}</p>
            </div>
            
        </div>

        <div class="row">
           
                <!-- <CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"/> -->
            
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

<style>

</style>
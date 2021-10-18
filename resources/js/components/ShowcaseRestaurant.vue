<template>
    <div class="container">
        <div class="row">
            
            <div class="col" v-for="cuisine in cuisines" :key="cuisine.id" >
                <p @click="getCuisine(cuisine.slug); getRestaurant(cuisine.slug);" :value="cuisine.id">{{ cuisine.name }}</p>
            </div>
            
        </div>

        <div  class="row">
           
                <CardRestaurant :cuisineSelect="cuisineSelect" :restaurants="restaurants"/>
            
        </div>

        <!-- <div id="card" v-if="cuisineSelect != '' ">

            <hr>
            
            <p class="text-center">Pag. {{currentPage}}</p>

            <div class="row justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item" :class="{'disabled' : currentPage == 1}">
                            <a class="page-link" href="#card" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <li class="page-item" v-for="i in lastPage" :key="i"><a class="page-link" href="#card">{{i}}</a></li>

                        <li class="page-item" :class="{'disabled' : currentPage == lastPage}">
                            <a class="page-link" href="#card" aria-label="Next" @click="changePage(currentPage + 1)">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div> -->
        
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
            currentPage: [],
            lastPage: []
        }
    },

    created(){
        this.getCuisines();
        // this.changePage(1)

        
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
            //     this.currentPage = response.data.results.current_page;
            //     this.lastPage = response.data.results.last_page;
            });

        
        },

        // changePage(page){
        //     axios.get("/api/cuisines/" + this.cuisineSelect, {
        //         params:{
        //             page: page
        //         }
        //     })
        //     .then((response) =>{
                
                
        //         this.currentPage = response.data.results.current_page;
        //         console.log(response.data.results);
        //     })
        // }
    }

}
</script>

<style>

</style>
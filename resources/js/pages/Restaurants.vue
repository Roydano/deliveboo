<template>
    <div id="back">
<<<<<<< HEAD
        <div class="container">
=======
    <div class="container">

        <h1>Scopri i nostri ristoranti</h1>
        
        <div class="row justify-content-around rests" v-scroll-reveal.reset>
>>>>>>> 89c8e12f0ad8052e270ba5530c9ea2a535ba49a5

                <div class="col-12 col-md-5 col-lg-3 m-2 rest" data-sr v-for="restaurant in restaurants" :key="restaurant.id">

                    <router-link :to="{name: 'restaurant', params: { slug: restaurant.slug}}">
                        <div class="card">
                            <img class="cover" :src="restaurant.img" :alt="restaurant.name">
                             <div class="card-body">
                                <h5 class="card-title text-center">{{restaurant.name}}</h5>
                                    <p class="card-text">
                                        <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                                    </p>
                            </div>
                        </div>
                    </router-link>
                </div>
                
        </div>

            <hr>
            
            <p class="text-center">Pag. {{currentPage}}</p>

            <div class="row justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item" :class="{'disabled' : currentPage == 1}">
                            <a class="page-link" href="#" aria-label="Previous" @click="getRestaurants(currentPage - 1)">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <li class="page-item" v-for="i in lastPage" :key="i"><a class="page-link" href="#" @click="getRestaurants(i)">{{i}}</a></li>

                        <li class="page-item" :class="{'disabled' : currentPage == lastPage}">
                            <a class="page-link" href="#" aria-label="Next" @click="getRestaurants(currentPage + 1)">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    

    
</template>

<script>

export default {
    name: 'Restaurants',
    data() {
        return {
            apiCall: 'http://localhost:8000/api/restaurants',
            restaurants: [],
            cuisines: [],
            currentPage: [],
            lastPage: []
        }
    },
    created(){
        this.getRestaurants(1);
    },
    methods: {
        getRestaurants(pageRest) {
            axios.get(this.apiCall, {
                params:{
                    page: pageRest
                }
            })
                .then( response => {
                    console.log(response.data.results);
                    this.restaurants = response.data.results.data;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style lang="scss" scoped>
    #back {
        padding-top: 80px;
        min-height: calc(100vh - 80px);
        background: url('https://source.unsplash.com/GXXYkSwndP4/1600x900');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover; 
        box-shadow: inset 0 0 0 50vw rgba(0, 0, 0, 0.5);
    }
    .container {
        overflow-y: hidden;
    }

    h1 {
        background-color: white;
        position: fixed;
        top: 80px;
        z-index: 9;
    }

    .rests {
        margin-top: 50px;
        overflow-y: auto;
        max-height: calc(100vh - 70px);
    }

    .card {
        padding: 0 !important;
        transition: all .2s linear;
        &:hover {
            transform: translateY(5px);
        }
    }
</style>
<template>
    <div id="back">
    <div class="container">
        <h1>Scopri i nostri ristoranti</h1>

            <div class="row justify-content-around rests">

                <div class="col-12 col-md-5 col-lg-3 m-2" v-for="restaurant in restaurants" :key="restaurant.id">
                    <router-link :to="{name: 'restaurant', params: { slug: restaurant.slug}}">
                        <div class="card">
                            <img class="cover" :src="restaurant.img" :alt="restaurant.name">
                             <div class="card-body">
                                <h5 class="card-title">{{restaurant.name}}</h5>
                                    <p class="card-text">
                                        <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                                    </p>
                            </div>
                        </div>
                    </router-link>
                </div>
                
            </div>

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
            cuisines: []
        }
    },
    created(){
        this.getRestaurants();
    },
    methods: {
        getRestaurants() {
            axios.get(this.apiCall)
                .then( response => {
                    this.restaurants = response.data.results;
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
        height: 100vh;
        background-image: url('https://source.unsplash.com/EWDvHNNfUmQ/1600x900');
        background-size:cover;
        background-position: fixed;
    }
    .container {
        overflow-y: hidden;
    }

    h1 {
        position: fixed;
        top: 0;
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
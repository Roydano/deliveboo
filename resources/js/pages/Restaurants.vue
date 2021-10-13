<template>
    <div id="back">
    <div class="container">

        <h1>Scopri i nostri ristoranti</h1>
        
        <div class="row justify-content-around rests">

                <div class="col-12 col-md-5 col-lg-3 m-2 rest" data-sr v-for="restaurant in restaurants" :key="restaurant.id">
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
import ScrollReveal from 'scrollreveal';
window.sr = new ScrollReveal();
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('div', {opacity: 0.9,duration:3000});
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
    html.sr .load-hidden {
        visibility: hidden;
    }
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
        margin-top: 50px;/* 
        overflow-y: auto;
        max-height: calc(100vh - 70px); */
    }

    .card {

        padding: 0 !important;
        transition: all .2s linear;
        &:hover {
            transform: translateY(5px);
        }
    }
</style>
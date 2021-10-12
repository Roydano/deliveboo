<template>

    <div id="back">
        <div class="container">

            <h1>{{restaurant.name}}</h1>

            <div v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</div>

            <div v-for="plate in menu" :key="plate.id">{{plate.name}}</div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'Restaurant',
    data() {
        return {
            restaurant: [],
            cuisines: [],
            menu: []
        }
    },
    created(){
        this.getRestaurant();
        this.getCuisines();
        this.getMenu();
    },
    methods: {
        getRestaurant() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug)
                .then( response => {
                    this.restaurant = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getCuisines() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/cuisines')
                .then( response => {
                    this.cuisines = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getMenu() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/menu')
                .then( response => {
                    this.menu = response.data.results;
                    console.log(response);
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
        min-height: 100vh;
        background-image: url('https://source.unsplash.com/EWDvHNNfUmQ/1600x900');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
</style>
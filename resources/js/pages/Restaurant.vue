<template>

    <div class="container">

        <h1>{{restaurant.name}}</h1>

        {{cuisines}}
        {{menu}}

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
                    console.log(this.cuisines);
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getMenu() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/menu')
                .then( response => {
                    this.menu = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style lang="scss" scoped>

    
</style>
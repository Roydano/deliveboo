<template>

    <div class="container">

        <h1>{{restaurant.name}}</h1>

        <span>Ristorante di cucina</span>
        <span class="mx-3" v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
        
        <!-- fatto spartano per vedere il menu...da sistemare-->
        <h5 class="mt-3">Antipasto</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 1">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>

        <h5 class="mt-3">Primo</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 2">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>

        <h5 class="mt-3">Secondo</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 3">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>

        <h5 class="mt-3">Contorno</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 4">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>

        <h5 class="mt-3">Snack</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 5">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>

        <h5 class="mt-3">Dolce</h5>
        <div v-for="plate in menu" :key="plate.id">
            <div v-if="plate.course_id == 6">
                <span>{{plate.name}}</span>
                <span>{{plate.price}}€</span>
            </div>
        </div>
        

        <div class="btn btn-success mt-3"><a @click="$router.go(-1)">Back</a></div>



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
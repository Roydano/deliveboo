<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            <div v-for="plate in plates" :key="plate.id" class="col">
                <div class="d-flex flex-column align-items-center">
                    <img :src="plate.img" :alt="plate.name" class="plateImg">
                    <div>{{plate.name}}</div>
                    <div>Prezzo: {{ plate.price }} €</div>
                    <div>{{ plate.description }}</div>
                    <hr>
                    <div class="add-to-cart-container"><button class="button-a"  @click="addPlateToCart(plate)">Aggiungi al carrello</button></div>
                </div>
                
            </div>

           
        </div>
        <div class="btn btn-success mt-3"><a @click="$router.go(-1)">Back</a></div>
    </div>
    
</template>

<script>
export default {
    name: 'MenuCourse',
    data() {
        return {
            plates: [],
            course: [],
            loading: false,
            plates: null,
            error: null,
        }
    },
    created() {
        this.getPlates();
        console.log(this.plates);
        this.getCourse();
        this.fetchData();
    },
    watch: {
        $route () {
        this.getPlates();
        this.getCourse();
        }
    },

    methods: {
        getCourse() {
            axios.get('http://localhost:8000/api/courses/' + this.$route.params.slugCourse)
                .then( response => {
                    this.course = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        /* getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    console.log(this.plates);
                    
                } )
                .catch(error => {
                    console.log(error);
                    console.log(this.$route.params.slug + this.$route.params.slugCourse);
                });
        } */
        getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    console.log(this.plates);
                    
                } )
                .catch(error => {
                    console.log(error);
                    console.log(this.$route.params.slug + this.$route.params.slugCourse);
                });
        },

        // metodi per il carrello
        fetchData() {

            this.error = this.plates = null;

            this.loading = true;

            axios // Implementa una Promise

                .get('/api/plates')

                .then(response => {

                    this.loading = true;
                    this.plates = response.data.results;

                }).catch(error => { // Nel caso di errori in arrivo

                    this.loading = false;

                    this.error = error.response.data.message || error.message;

                });

        },
         addPlateToCart(plate) {
            this.$store.commit('addToCart', plate); // Qui invece chiamiamo il metodo dello Storagein store.js
        }

    }
}
</script>

<style lang="scss" scoped>
.plateImg {
    width: 100%;
}
</style>

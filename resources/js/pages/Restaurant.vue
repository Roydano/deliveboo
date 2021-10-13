<template>

    <div id="back">
        <div class="container">

            <h1 class="text-center py-3">{{restaurant.name}}</h1>
            <div v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</div>

            <div class="d-flex flex-column flex-lg-row justify-content-lg-around ">
                <router-link v-for="course in courses" :key="course.id" class="courseName" :to="{name: 'showMenu', params: { slug: restaurant.slug, slugCourse: course.slug}}">
                    <span>{{course.name}}</span>
                </router-link>
            </div>

            <transition> 
                <router-view></router-view>
            </transition>

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
            courses: [],
        }
    },
    created(){
        this.getRestaurant();
        this.getCuisines();
        this.getCourses();
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
        getCourses() {
            axios.get('http://localhost:8000/api/courses')
                .then( response => {
                    this.courses = response.data.results;
                } );
        },
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

    .courseName {
        font-size: 25px;
        color: black;
        text-transform: uppercase;
        font-weight: bold;
        transition: all .3s ease-in-out;
        &:hover {
            transform: scale(1.1);
        }
        a {
            color: black;
            text-decoration: none;
        }
    }
    
</style>
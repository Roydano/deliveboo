<template>

    <div id="back">
        <div class="container">

            <h3 class="text-center pt-4 text-white">{{restaurant.name}}</h3>

            <div class="cuisine">
                <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
            </div>
        </div>
            
        <div class="black py-3 my-4">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-lg-around ">
                    <router-link v-for="course in courses" :key="course.id" class="courseName" :to="{name: 'showMenu', params: { slug: restaurant.slug, slugCourse: course.slug}}" >
                        <span>{{course.name}}</span>
                    </router-link>
                </div>
            </div>
        </div>

             <!-- <transition enter-active-class="animate__animated animate__fadeInLeft" leave-active-class="animate__animated animate__fadeInLeft"> -->
            <transition name='fade'>
                <router-view v-slot="{Component}" :key="$route.fullPath">
                        <component :is="Component"/>
                </router-view>
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
            active: []
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
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getCourses() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/courses')
                .then( response => {
                    this.courses = response.data.results;
                } );
        },
    }
}
</script>

<style lang="scss" scoped>
    #back {
        min-height: calc(100vh - 80px);
        background: url('https://source.unsplash.com/GXXYkSwndP4/1600x900');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover; 
        box-shadow: inset 0 0 0 50vw rgba(0, 0, 0, 0.5);
    }

    .black {
        background-color: black;
    }

    .courseName {
        font-size: 20px;
        color: white;
        text-transform: uppercase;
        font-weight: 100;
        transition: all .3s ease-in-out;
        &:hover {
            transform: scale(1.1);
        }
        a {
            color: black;
            text-decoration: none;
        }
        a.router-link-active {
        border-bottom: 2px solid white;
        transform: scale(1.1);
    }
    }

    

    .cuisine {
        font-size: 13px;
        font-style: italic;
    }

   /*  .fade-enter-active {
        transition: opacity 4s ease-in-out;
    }

    .fade-enter-to {
        opacity: 1;
    }
    .fade-leave-active {
        transition: opacity 0.3s ease-in-out;
    }


    .fade-enter-from,
    .fade-leave-to {
         opacity: 0 !important;
    } */
    
    .fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
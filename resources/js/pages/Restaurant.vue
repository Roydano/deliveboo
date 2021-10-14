<template>

    <div id="back">
        <div class="container">

            <section class="head">

                <h3 class="text-center py-4 text-white restName">{{restaurant.name}}</h3>

                <div class="cuisine">
                    <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                </div>

            </section>
        
        </div>

        <div class="row">

            <div class="my-4 text-center courses col-lg-3">
                <div class="d-flex flex-column justify-content-lg-around ">
                    <router-link v-for="course in courses" :key="course.id" class="courseName black py-3" :to="{name: 'showMenu', params: { slug: restaurant.slug, slugCourse: course.slug}}" exact>
                        <span>{{course.name}}</span>
                    </router-link>
                </div>
            </div>


                 <!-- <transition enter-active-class="animate__animated animate__fadeInLeft" leave-active-class="animate__animated animate__fadeInLeft"> -->
            <transition name="fade" mode="out-in">
            <router-view v-slot="{Component}" :key="$route.fullPath" class="showPlates col-lg-9">
                    <component :is="Component"/>
            </router-view>
            </transition>
    
            </div>
        </div>
    </div>
</template>

<script>

export default {


    name: 'Restaurant',
    linkExactActiveClass: 'is-active',
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

    .showPlates {
        max-height: 65vh;
        overflow-y: auto;
    }

    .head {
        height: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .black {
        background-color: black;
        display: inline;
    }

    .restName {
        font-weight: 300;
    }


    .courseName {
        font-size: 20px;
        display: inline-flex;
        color: white;
        text-transform: uppercase;
        font-weight: 100;
        transition: all .3s ease-in-out;
        a {
            color: black;
            text-decoration: none;
            padding-bottom: 5px;
        }
        &:hover {
            font-size: 24px;
            text-decoration: none;
        }
        &.router-link-active,
        &.router-link-exact-active{
            font-size: 24px;
            border-bottom: 2px solid white;
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
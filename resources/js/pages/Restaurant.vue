<template>

    <div id="back">
        
        <div class="row">

            <div class="my-4 text-center courses col-lg-2">
                <div class="d-flex flex-column justify-content-lg-around ">
                    <router-link v-for="course in courses" :key="course.id" class="courseName"
                    :to="{name: 'showMenu', params: { slug: restaurant.slug, slugCourse: course.slug}}" exact>
                        <span class="black my-2 p-3 ps-0">{{course.name}}</span>
                    </router-link>
                </div>
            </div>

            <div class="col-lg-10">

            <section class="container head">

                <h3 class="text-center py-4 text-white restName">{{restaurant.name}}</h3>

                <div class="cuisine">
                    <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                </div>

            </section>

            
            <router-view v-slot="{MenuCourse}" :key="$route.params.slugCourse" class="showPlates">
                    <component :is="MenuCourse"/>
            </router-view>
        
            </div>
                 <!-- <transition enter-active-class="animate__animated animate__fadeInLeft" leave-active-class="animate__animated animate__fadeInLeft"> -->
            
    
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
            slugRest: "",
            loaded: false
        }
    },
    created(){
        this.getRestaurant();
        this.getCuisines();
        this.getCourses();
        
    },
    watch: {

        /* ora mostra antipasto, fare pagina atterraggio */
        /* loaded: function() {
            this.$router.push('/restaurants/' + this.$route.params.slug + '/' + this.courses[0].slug);
        } */
    },
    methods: {
        getRestaurant() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug)
                .then( response => {
                    this.restaurant = response.data.results;
                    this.slugRest =  this.$route.params.slug;
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
                    this.loaded = true;
                } );
        }
    }
}
</script>

<style lang="scss" scoped>
    #back {
        min-height: calc(100vh - 80px);
        background: url('https://source.unsplash.com/d-RR7nNcUB8/1600x1200');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
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
        align-items: end;
        justify-content: center;
    }

    .black {
        background-color: rgba($color: #000, $alpha: 0.6);
        display: inline;
    }

    .restName {
        font-size: 30px;
        font-weight: 300;
    }


    .courseName {
        font-size: 20px;
        display: inline-flex;
        color: white;
        text-transform: uppercase;
        font-weight: 100;
        transition: all .3s ease-in-out;
        span {
            transition: all .3s ease-in-out;
        }
        a {
            color: black;
            text-decoration: none;
            padding-bottom: 5px;
        }
        &:hover {
            font-size: 24px;
            text-decoration: none;
        }
        &.router-link-active span,
        &.router-link-exact-active span{
            font-size: 24px;
            border-bottom: 1px solid white;
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
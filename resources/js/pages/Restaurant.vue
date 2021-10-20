<template>


    <div id="back" :style="{'background-image': 'url(' + restaurant.img + ')' }">
         
   
        <div class="grad">
           

        <section class="container head">
           

                    <h3 class="text-center restName titolo">{{restaurant.name}}</h3>

                    <div class="cuisine text-center">
                        <span class="mostra-cucine" v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                    </div>

        </section>

        <div class="row main-cont justify-content-between">

               
            <div class="my-4 text-center courses col-2 d-flex flex-column justify-content-center">

                    
             
                    <router-link v-for="course in courses" :key="course.id" class="courseName"
                    :to="{name: 'showMenu', params: { slug: restaurant.slug, slugCourse: course.slug}}" exact>
                        <span class="black my-2 p-3 ps-0">{{course.name}}</span>
                    </router-link>
               
            </div>

            <div class="col-10 cont-right">
            
                <router-view v-slot="{MenuCourse}" :key="$route.params.slugCourse" class="showPlates">
                        <component :is="MenuCourse"/>
                </router-view>
        
           
                 <!-- <transition enter-active-class="animate__animated animate__fadeInLeft" leave-active-class="animate__animated animate__fadeInLeft"> -->
            
        </div>

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
                    console.log(this.cuisines);
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
        height: 100vh;
        
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
        box-shadow: inset 0 0 0 50vw rgba(0, 0, 0, 0.5);
    }
    .titolo,
    .mostra-cucine
    {

        color:white
    }


    .grad {
        background: linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.4) 20%, rgba(0,0,0,0.7) 100%);
        height: 100%;
    }

    .main-cont{
        height: calc(100% - 7rem);
    }

    .cont-right {
        padding-left: 2rem;
        height: 100%;
    }

    .courses {
        height: calc(100% - 7rem);
    }

    .showPlates {
        height: 100%;
        overflow-y: auto;
    }

    .head {
        height: 7rem;
        display: flex;
        
        flex-direction: column;
        justify-content: center;
        padding-top: 2rem;
    }

    .restName {
        text-transform: uppercase;
        font-size: 3rem;
        font-weight: 100;
        max-width: 72%;
        margin: auto;
    }


    .courseName {
        font-size: 1.2rem;
        display: inline-flex;
        color: white;
        text-transform: uppercase;
        font-weight: 100;
        transition: all .2s linear;
        height: 3rem;
        span {
            transition: all .2s linear;
        }
        a {
            color: black;
            text-decoration: none;
        }
        &:hover {
            font-size: 1.4rem;
            text-decoration: none;
        }
        &.router-link-active span,
        &.router-link-exact-active span{
            font-size: 1.5rem;
            font-weight: 200;
        }
    
    }
    
    .cuisine {
        font-size: 0.7rem;
    }
  
    
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }

    // mostra cucine

    .mostra-cucine{
        
        padding:7px;
        font-size:1rem;
        padding-top:10px;
        margin-bottom:15px;
    }
</style>
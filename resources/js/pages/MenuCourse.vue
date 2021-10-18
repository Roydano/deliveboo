<template>
    <div class="container cont">
        <router-view v-slot="{Plate}" :key="$route.params.slugPlate" class="showPlate">
                    <component :is="Plate"/>
            </router-view>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

        <div v-for="plate in plates" :key="plate.id" class="col p-3 plate">
            <div class="card_plate text-white">
                <div class="cover_cont">

                    <router-link :to="{name: 'showPlate', params: { slugPlate: plate.slug}}">
                        <img :src="plate.img" :alt="plate.id" class="plateImg">
                    </router-link>
                    
                    <div class="icons">
                        <router-link :to="{name: 'showPlate', params: { slugPlate: plate.slug}}"><i class="fas fa-eye show"></i></router-link>
                    </div>

                    <div class="text-uppercase name"><span>{{plate.name}}</span></div>
                    
                </div>

                <div class="infos">

                    <div class="descr mt-2 mb-3 px-4">{{plate.description}}</div>

                    <div class="price d-flex align-items-center justify-content-center" @click="addPlateToCart(plate)">

                        <span class="prezzo">{{plate.price}}€</span>
                        
                        <img class="cart" src="/storage/img/add-to-cart.png" alt="cart icon">
                                                
                    </div>
                </div>
                
            </div>
        </div>
        </div>

        

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
        this.getCourse();
        this.fetchData();
    },

    methods: {
        
        truncate(text, maxlength){
            if(text.length > maxlength) {
               return text.substr(0, maxlength) + '...';
            }
            return text;
        },
        getCourse() {
            axios.get('http://localhost:8000/api/courses/' + this.$route.params.slugCourse)
                .then( response => {
                    this.course = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    this.plates.forEach(elem => {
                        elem.description = this.truncate(elem.description, 60);
                    });
                    
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        
         addPlateToCart(plate) {
            this.$store.commit('addToCart', plate); 
        }
        

    }
}
</script>

<style lang="scss" scoped>
    * {
        font-family: 'Montserrat';
    }

    
    .card_plate {
        padding: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        /* box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px; */
        transition: all 0.3s ease-in-out;
        &:hover {
            transform: translateY(-5px);
        }
    }
    .card_plate:hover .icons {
        display: inline;
    }
    .card_plate:hover .plateImg {
        filter: brightness(120%);
    }
    .plateImg {
        width: 100%;
        max-height: 180px;
        object-fit: cover;
        object-position: center;
        transition: all 0.2s linear;
    }
    .cover_cont {
        position: relative;
        .icons {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            transition: all 0.3s ease-in-out;
            a, a:hover {
                color: rgba($color: #FFF, $alpha: 0.8);
            }
        }
    }
    .name {
        text-align:center;
        position: absolute;
        bottom: -5px;
        padding: 5px 10px;
        padding-top: 40px;
        width: 100%;
        background: rgb(0,0,0);
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 40%, rgba(0,0,0,1) 100%);
        font-size: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .infos {
        background: rgb(0,0,0);
        background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.7) 50%, rgba(0,0,0,1) 100%);
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        &:hover {
            .cart, .prezzo {
                transform: scale(1.1);
            }
        }
        
        .descr {
            font-style: italic;
            font-size: 0.8rem;
            text-align: center
        }
        .price {
            width: 100%;
            padding: 0 8%;
            border-radius: 20px;
            position: relative;
            cursor: pointer;

        }
    }

    .showPlate {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart {
        filter: invert(1);
        position:absolute;
        right: 5px;
        bottom: 5px;
        max-width: 2rem;
    }

    .prezzo {
        font-size: 1rem;
    }

    .cart, .prezzo {
        transition: all .2s ease-in-out;
    }

    

</style>

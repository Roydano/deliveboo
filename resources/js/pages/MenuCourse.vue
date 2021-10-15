<template>
    <div class="container cont">
        <router-view v-slot="{Plate}" :key="$route.params.slugPlate" class="showPlate">
                    <component :is="Plate"/>
            </router-view>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

        <div v-for="plate in plates" :key="plate.id" class="col p-3 plate">
            <div class="card_plate text-white">
                <div class="cover_cont">

                    <img :src="plate.img" :alt="plate.id" class="plateImg">

                    <div class="icons">
                        <i class="fas fa-eye show"></i>
                    </div>
                    
                </div>

                <div class="infos">

                    <div class="text-uppercase name">{{plate.name}}</div>

                    <div class="descr m-3">{{plate.description}}</div>

                    <div class="price d-flex justify-content-around">
                        <span>{{plate.price}}€</span>
                        <i class="fas fa-cart-plus"></i>
                        <router-link :to="{name: 'showPlate', params: { slugPlate: plate.slug}}"><i class="fas fa-eye"></i></router-link>
                        
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
        }
    },
    created() {
        this.getPlates();
        this.getCourse();
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
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
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
            font-size: 60px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
    }
    .infos {
        background-color: rgba($color: #000000, $alpha: 0.8);
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        .name {
            font-size: 20px;
        }
        .descr {
            font-style: italic;
            font-size: 14px;
            text-align: center
        }
        .price {
            font-weight: bold;

        }
    }

    .showPlate {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99;
        
    }

    

</style>

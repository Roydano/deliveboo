<template>
    <div class="container">

        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">

        <div v-for="plate in plates" :key="plate.id" class="col p-3">
            <div class="card_plate text-white">
                <div class="cover_cont">
                    <img :src="plate.img" :alt="plate.id" class="plateImg">
                    <i class="fas fa-cart-plus cart"></i>
                </div>
                <div class="infos">
                    <div class="text-uppercase name">{{plate.name}}</div>
                    <div class="descr m-3">{{plate.description}}</div>
                    <div class="price">{{plate.price}}€</div>
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
    watch: {
        $route () {
        this.getPlates();
        this.getCourse();
        }
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
    .card_plate:hover .cart {
        display: inline;
    }
    .plateImg {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
    }
    .cover_cont {
        position: relative;
        .cart {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            cursor: pointer;
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


</style>

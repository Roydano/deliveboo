<template>
    <div class="container">

        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">

        <div v-for="plate in plates" :key="plate.id" class="col p-3">
            <div class="card_plate text-white">
                <img :src="plate.img" :alt="plate.id" class="plateImg">
                <div class="infos">
                    <div class="text-uppercase">{{plate.name}}</div>
                    <div class="descr">{{plate.description}}</div>
                    <div>{{plate.price}}</div>
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
        console.log(this.plates);
        this.getCourse();
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
        getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    console.log(this.plates);
                    
                } )
                .catch(error => {
                    console.log(error);
                });
        }

    }
}
</script>

<style lang="scss" scoped>
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
    .plateImg {
        width: 100%;
        max-height: 250px;
    }
    .infos {
        background-color: rgba($color: #000000, $alpha: 0.8);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        .descr {
            font-style: italic;
        }
    }

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

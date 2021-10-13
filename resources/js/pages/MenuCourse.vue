<template>
    <div class="container">
        <transition name='fade' mode='out-in'>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
        <div v-for="plate in plates" :key="plate.id" class="col">
            <div class="d-flex flex-column align-items-center">
                <img :src="plate.img" :alt="plate.id" class="plateImg">
                {{plate.name}}
            </div>
            
        </div>
        
</div>
</transition>
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
.plateImg {
    width: 100%;
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

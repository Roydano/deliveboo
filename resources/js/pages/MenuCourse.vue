<template>
    <div>
        {{course.name}}

        <div v-for="plate in plates" :key="plate.id">{{plate.name}}</div>


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
        /* getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    console.log(this.plates);
                    
                } )
                .catch(error => {
                    console.log(error);
                    console.log(this.$route.params.slug + this.$route.params.slugCourse);
                });
        } */
        getPlates() {
            axios.get('http://localhost:8000/api/restaurants/' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results;
                    console.log(this.plates);
                    
                } )
                .catch(error => {
                    console.log(error);
                    console.log(this.$route.params.slug + this.$route.params.slugCourse);
                });
        }

    }
}
</script>

<style lang="scss" scoped>

</style>

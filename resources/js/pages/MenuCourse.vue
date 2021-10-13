<template>
    <div>{{course}}</div>
</template>

<script>
export default {
    name: 'MenuCourse',
    data() {
        return {
            plates: [],
            course: []
        }
    },
    created() {
        this.getPlates();
    },
    methods: {
        getPlates() {
            axios.get('http://localhost:8000/api/restaurants' + this.$route.params.slug + '/' + this.$route.params.slugCourse)
                .then( response => {
                    this.plates = response.data.results.plates;
                    this.course = response.data.results.course;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>

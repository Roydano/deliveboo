<template>
    <div class="container">
        <h3>{{ cuisine.name }}</h3>
    </div>
</template>

<script>
    export default {
        name: 'Cuisine',
        data() {
            return {
                cuisine: []
            }
        },
        mounted() {
            axios.get('/api/cuisines/' + this.$route.params.slug)
                .then( response => {
                    this.cuisine = response.data.results;
                });
        }
    }
</script>

<style lang="scss" scoped>

</style>

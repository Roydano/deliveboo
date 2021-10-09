<template>
  <div class="container">
    cuisine
    <div v-for="restaurant in restaurants" :key="restaurant.id">
      <h4>{{ restaurant.name }}</h4>
    </div>
  </div>
</template>

<script>
<<<<<<< HEAD
    export default {
        name: 'Cuisine',
        data() {
            return {
                cuisine: [],
            }
        },
        mounted() {
            axios.get('/api/cuisine/' + this.$route.params.slug)
                .then( response => {
                    this.cuisine = response.data.results;
                })
                .catch(error=> {
                    console.log(error);
                })
        }
    }
=======
export default {
  name: "Cuisine",
  data() {
    return {
      restaurants: [],
    };
  },
  mounted() {
    axios.get("/api/cuisines/" + this.$route.params.slug).then((response) => {
      this.restaurants = response.data.results;
      console.log(this.restaurants);
    });
  },
};
>>>>>>> 93c35c679e0e8bcbb5c8243aaca3fc4f457af3d1
</script>

<style lang="scss" scoped>
</style>

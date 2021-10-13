<template>

<!-- cuisine.vue -->
  <div class="container">
    cuisine
    <div v-for="restaurant in restaurants" :key="restaurant.id">
      <h4>{{ restaurant.name }}</h4>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cuisine",
  data() {
    return {
      restaurants: [],
    };
  },
  mounted() {
    axios.get("/api/cuisines/" + this.$route.params.slug)
    .then((response) => {
      console.log(this.$route.params.slug);
      this.restaurants = response.data.results;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>

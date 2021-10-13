<template>
  <div class="container">
    <h2>Cucina {{name}}</h2>
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
      name: "",
    };
  },
  mounted() {
    axios.get("/api/cuisines/" + this.$route.params.slug)
    .then((response) => {
      this.restaurants = response.data.results;
      this.name = this.$route.params.name;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>

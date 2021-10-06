<template>
  <div>

  </div>
</template>

<script>
export default {
    name: 'Cuisine',
    data(){
        return{
            plates:[]
        }
    },

    mounted(){
        axios.get('/api/cuisines/' + this.$route.params.slug)
            .then( response => {
                console.log(response.data.results);
                // this.plates = response.data.result;
            })
            .catch();
    }

}
</script>

<style>

</style>
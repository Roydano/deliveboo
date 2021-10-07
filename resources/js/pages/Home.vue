<template>
    
     <div class="container"> 

            <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3" v-for="cuisine in cuisines" :key="cuisine.id">
                        <router-link :to="{name: 'cuisine', params: { slug: cuisine.slug}}">
                            <div class="card mt-3">
                                <div class="card-body text-center">
                                    <h5 class="card-text">{{ cuisine.name}}</h5>
                                </div>
                            </div>
                        </router-link>
                    </div>
                
            </div>

        </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            apiCall: 'http://localhost:8000/api/cuisines',
            cuisines: []
        }
    },
    created(){
        this.getCuisines();
    },
    methods: {
        getCuisines() {
            axios.get(this.apiCall)
                .then( response => {
                    // console.log(response.data.results);
                    this.cuisines = response.data.results;
                    

                } )
                .catch(error => {
                    console.log(error);
                });
        },

        truncate(text, maxlength){
            if(text.length > maxlength) {
               return text.substr(0, maxlength) + '...';
            }
            return text;
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
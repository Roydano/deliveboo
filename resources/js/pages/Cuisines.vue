<template>
    
     <div class="container" style="padding-top: 80px;">
            <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4" v-for="cuisine in cuisines" :key="cuisine.id">
                        <router-link :to="{name: 'cuisine', params: { slug: cuisine.slug, name: cuisine.name}}">
                            <div class="card text-center mt-3 bg" :style="{'background-image': 'url(' + cuisine.img + ')' }">
                                <div class="title cus">{{ cuisine.name}}</div>
                            </div>
                        </router-link>
                    </div> 
                
            </div>





        </div>
</template>

<script>
export default {
    name: "Cuisines",
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
                    this.cuisines = response.data.results;
                    

                } )
                .catch(error => {
                    console.log(error);
                });
        },
    }
}
</script>

<style lang="scss" scoped>
    .title {
        font-size: 2.2rem;
        text-transform: uppercase;
        color: black;
        text-decoration: none;
        font-style:italic;
    }
    .card {
        height: 180px;
        background-size: cover;
        background-position: center;
        font-style:italic;
    }

    .cuisinePic {
        width: 100%;
    }

    .cus{
        color:white;
    }

    .cus:hover{
          transition: 0.5s;
          transition-property: color;
          color: #19B3D3;

    }
    
</style>
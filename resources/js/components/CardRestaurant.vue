<template>
    <div>
        <div  v-if="cuisineSelect != '' " class="card-restaurant">

            <h3>cucina {{ cuisineSelect }}</h3>

            <div class="row d-flex">
                <div v-for="restaurant in restaurants" :key="restaurant.id" class="col">

                    <router-link :to="{name: 'restaurant', params:{slug: restaurant.slug}}">

                        <div  class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ restaurant.name }}</h5>
                                <p class="card-text">{{ restaurant.address}}</p>
                        
                            </div>
                        </div>

                    </router-link>


                   

                </div>
            </div>
            

        </div>


        

        
    </div>
</template>

<script>
export default {
    name: 'CardRestaurant',
    props:['cuisineSelect', 'restaurants'],


    data(){
        return{

        }
    },
    

}
</script>

<style lang="scss" scoped>

</style>
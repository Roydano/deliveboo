<template>
    <div>
        <div  v-if="cuisineSelect != '' " class="card-restaurant">

            <h3>cucina {{ cuisineSelect }}</h3>

            <div class="row d-flex">
                <div v-for="restaurant in restaurants" :key="restaurant.id" class="col">

                    <div  class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ restaurant.name }}</h5>
                            <p class="card-text">{{ restaurant.address}}</p>
                       
                                <a href="#" class="btn btn-danger">Vai al ristorante</a>
                    
                        </div>
                    </div>

                </div>
            </div>

            
        </div>

        
    </div>
</template>

<script>
export default {
    name: 'CardRestaurant',
    props:['cuisineSelect', 'restaurants'],

    
    

}
</script>

<style lang="scss" scoped>

</style>
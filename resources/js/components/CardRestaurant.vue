<template>
    <div>
        <div class="sfondo"  v-if="cuisineSelect != '' " >

            <h3>Cucina {{ cuisineSelect }}</h3>

            <div >
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
}
</script>

<style lang="scss" scoped>
*{
    text-decoration:none;
}
h5{
    color:white;
    text-decoration:none;
    margin-top:25px;
    text-transform:uppercase;
     transition: 0.5s ease-in-out;
     transition-property: color;

    
}
h5:hover{
    text-decoration:none;
    border:none;
    color: #19B3D3;
    
    
    transition:0.2s;
}

#h5 {transition-timing-function: ease-out;}




</style>
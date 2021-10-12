<template>
    
    <div> 
        <Jumbo/>
        <ShowcaseRestaurant/>
    </div>
</template>

<script>

import Jumbo from '../components/Jumbo';
import ShowcaseRestaurant from '../components/ShowcaseRestaurant';

export default {
    name: "Home",
    components: {
        Jumbo,
        ShowcaseRestaurant
    }
}
</script>

<style lang="scss" scoped>
</style>

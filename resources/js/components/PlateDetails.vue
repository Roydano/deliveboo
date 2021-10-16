<template>
    <div  class="plate-cont" v-bind:style="{backgroundImage: 'url(' + plate.img + ')'}">

                <div v-click-outside="onClickOutside" class="box d-flex flex-column     justify-content-center align-items-center text-white">

                    <div class="name">{{plate.name}}</div>

                    <div class="descr text-center my-3">
                        {{plate.description}}
                    </div>

                    <div class="info text-center">
                        <h6 class="infotitle">Ingredienti</h6>
                        {{plate.ingredients}}
                        <h6 class="infotitle mt-2">Prezzo</h6>
                        {{plate.price}}€
                    </div>
                </div>
            
    </div>
</template>

<script>
export default {
    name: PlateDetails,
    data() {
        return {
            plate: []
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
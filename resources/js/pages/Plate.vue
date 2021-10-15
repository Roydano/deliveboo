<template>
    <div class="cont">
        <div  class="plate-cont" v-bind:style="{backgroundImage: 'url(' + plate.img + ')'}">
            <h1 v-click-outside="onClickOutside" class="text-white">{{plate.name}}</h1>
        </div>
        
    </div>
  
</template>

<script>
export default {
  name: 'Plate',
  data() {
    return {
      plate: [],
      open: false
    };
  },
  mounted() {
    this.getPlate();
    this.wait();
    },
    methods: {
        wait() {
            console.log('wait');
            setTimeout(()=>{
   this.open = true;
},1000);
        },
        onClickOutside () {
            console.log(this.open);
            if (this.open) {
                this.$router.back();
            }
        },
        getPlate() {
            axios.get('http://localhost:8000/api/plates/' + this.$route.params.slugPlate)
                .then( response => {
                    this.plate = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
            
    }

}
</script>

<style lang="scss" scoped>
    .cont {
        background-color: rgba($color: #000, $alpha: 0.6);
        width: 100vw;
        height: 100vh;
        z-index: 99;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .plate-cont {
        width: 50vw;
        height: 60vh;
        background-size: cover;
        background-position: center;
        border-radius: 20px;
        box-shadow: inset 0 0 0 50vw rgba($color: #FFF, $alpha: 0.6);
    }
</style>

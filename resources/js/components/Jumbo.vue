<template>

    <div class="jumbo-cont d-flex ">
        
         <div class="overlay">

            <video autoplay muted loop>    
                <source  src="/storage/img/jumbovid.mp4" type="video/mp4">
            </video>

        
    </div>

    </div>
    
</template>

<script>

export default {
    name: 'Jumbo',
}
</script>

<style lang="scss" scoped>
@import '../../sass/commons';
    .jumbo-cont {
        background-color: rgba($color: #000000, $alpha: 0.5);
        height: 100vh;
        object-position: center;
    }

    .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,.7);
  z-index: 2;
  overflow: hidden;

  
}

    video {
   
        object-position: center;
        min-width:100%;
    }

    .jumbo {
        font-size: 28px;
        height: 100%;
        width: 20%;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        .links {
            font-size: 18px;
            color: whitesmoke;
            transition: all .3s linear;
            &:hover {
                color: rgb(187, 184, 184);
                transform: scale(1.1);
            }
        }
    }
</style>
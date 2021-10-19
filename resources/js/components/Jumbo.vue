<template>

    <div class="jumbo-cont d-flex position-relative justify-content-center">
        
        <div class="overlay">
            <video autoplay muted loop>    
                <source src="/storage/img/jumbovid.mp4" type="video/mp4">
            </video>
        </div>

            <!-- <Cart/> -->

            <div class="mb-5">
              
                Ordina dai migliori ristoranti della tua città
            
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
        background-color: black;
        height: 100vh;
        overflow: hidden;
        justify-content: flex-end;
    }
    video {
        height: 100%;
    }
    .overlay {
        background-color: rgba($color: #000000, $alpha: .5);
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
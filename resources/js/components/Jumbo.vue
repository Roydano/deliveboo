<template>
    <div>
        
        <!-- jumbo -->
        <div class="position-relative">

            <video autoplay muted loop>    
                    <source src="/storage/img/jumbovid.mp4" type="video/mp4">
            </video>

            <div class="jumbotron jumbotron-fluid jumbo">
                <div class="container text-white">
                
                    <h1 class="display-4">Ordina tra i migliori ristoranti della tua città</h1>
                    <p class="lead">Con WannaEat puoi gustare i tuoi piatti preferiti comodamente da casa tua</p>
                    <hr class="my-4">
                    <p>Scegli tra una vasta selezione di cucine, esplora i ristoranti e ordina i piatti con un semplice click. Dal ristorante, direttamente a casa tua.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Esplora</a>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Jumbo',
}
</script>

<style lang="scss" scoped>
    video {
        width: 100%;
    }

    .jumbo {
        position: absolute;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba($color: #000000, $alpha: 0.4);
    }
</style>
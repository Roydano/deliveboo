<template>
 
    <div class="cont">

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Desideri cambiare ristorante?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div>Aggiungendo questo prodotto, il cartello verrà svuotato.</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancella</button>
                      <button type="button" class="btn btn-primary" @click="emptyAdd">Prosegui</button>
                    </div>
                  </div>
                </div>
            </div>

            <div class="container" id="cart" v-click-outside="onClickOutside">      

        <div class="bg-btn" @click="showCart = !showCart">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="numb">{{ $store.state.num }}</span>
        </div>

        <div id="showMenu" v-show="showCart && $store.state.num">
                    <div class="container">
                        <div class="total-header-section w-100">

                            <div class="cart-list text-center w-100">

                                <table class="tableFull text-center" >
                                    <thead>
                                        <tr>
                                            <th>Prodotto</th>
                                            <th>Prezzo</th>
                                            <th>Quantità</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="plate in $store.state.cart" :key="plate.id">
                                            
                                            <td class="d-flex flex-column justify-content-center align-items-center">
                                                <div class="imgCont mr-2"><img :src="plate.img" :alt="plate.name" class="imgPlate"></div>
                                                
                                                {{ plate.name }}
                                            </td>

                                            <td>
                                                {{ plate.tot.toFixed(2) }} €
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-around">

                                                    <p class="pointer" @click="remove(plate)"><i class="fas fa-minus"></i></p>

                                                    <p class="px-2">{{plate.qty}}</p>

                                                    <p class="pointer" @click="add(plate)"><i class="fas fa-plus"></i></p>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>

                                <div class="text-start my-2"><b >Totale: {{ $store.state.cartTotal.toFixed(2) }} € </b></div>

                            </div>

                            <div class="w-100 text-center checkout checkout-cart-button-container">
                                
                                <router-link :to="{ name: 'checkout' }"><button class="button-b btn btn-success btn-block">Checkout</button></router-link>

                            </div>
                        </div>
                    </div>
        </div>
        
    </div>
    </div>
    
</template>

<script>
export default {
    name: 'Cart',
    data(){
        return {
            showCart: false,
        }
    },
    computed: {
        rest(){
            return this.$store.state.diffRest;
        }
    },
    watch: {
        rest: function(){
            if(this.rest) {
                $('#modal').modal('show');
            }
        }
    },
    methods: {
        remove(plate) {      
            const quantity = 1;     
            this.$store.commit('removeFromCart', {plate, quantity});
        },

        add(plate){
            const quantity = 1; 
           this.$store.commit('addByCart', {plate, quantity});
        },
        emptyAdd(){
            this.$store.delete();
        },
        onClickOutside() {
            this.showCart = false;
        }

    }
}
</script>

<style lang="scss" scoped>
    .modal-cont {

    }
    .container {
        position: relative;
        transform: translateY(20px);
    }

    .tableFull {
        width: 100%;
        tbody {
            padding-top: .8rem;
        }
        th {
            padding: 0 20px;
        }
    }
    #cart{
        position: fixed;
        right: 10px;
        width: auto;
        height: auto;
        transition: all .2s linear;
        color: black;

        .numb {
            padding: 3px 10px;
            background-color: rgba($color: #000000, $alpha: 0.8);
            font-size: .9rem;
            color: white;
            border-radius: 20px;
        }
        

        .bg-btn {
            background-color:whitesmoke;
            border-radius: 20px;
            display: inline;
            cursor: pointer; 
            padding: 10px 15px;
        }

        #showMenu {
            .container {
                border-radius: 20px;
                background-color: whitesmoke;
                padding: 15px;
                position: absolute;
                right: 10px;
                width: max-content;
            }
        }

        .pointer{
            cursor: pointer;
        }

        .imgCont {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }
        .imgPlate {
            max-height: 100%;
        }
    }

</style>
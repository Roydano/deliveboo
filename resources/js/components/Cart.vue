<template>
 
    <div class="container" id="cart" v-click-outside="onClickOutside">

        <div class="bg-btn" @click="showCart = !showCart">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="badge badge-pill badge-dark">{{ $store.state.num }}</span>
        </div>

        <div id="showMenu" v-show="showCart">
                    <div class="container">
                        <div class="total-header-section w-100">

                            <div class="cart-list text-center w-100">

                                <table class="tableFull">
                                    <thead>
                                        <tr>
                                            <th>Prodotto</th>
                                            <th>Prezzo</th>
                                            <th>Quantità</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="plate in $store.state.cart" :key="plate.id">
                                            
                                            <td>
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
</template>

<script>
export default {
    name: 'Cart',
    data(){
        return {
            showCart: false
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
        onClickOutside() {
            this.showCart = false;
        }

    }
}
</script>

<style lang="scss" scoped>

    .container {
        position: relative;
        transform: translateY(10px);
    }

    .tableFull {
        width: 100%;
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
        

        .bg-btn {
            background-color:whitesmoke;
            border-radius: 20px;
            display: inline;
            cursor: pointer; 
            padding: 5px 10px;
        }

        #showMenu {
            .container {
                border-radius: 20px;
                background-color: whitesmoke;
                padding: 15px;
                position: absolute;
                right: 10px;
                width: fit-content;
            }
        }

        .pointer{
            cursor: pointer;
        }
    }

</style>
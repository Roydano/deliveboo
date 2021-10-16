<template>
 
    <div class="container">
        <div id="cart" class="col-lg-12 col-sm-12 col-12 main-section">
            <div>
                <button type="button" class="btn orange" @click="showCart = !showCart">

                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    
                    <span class="badge badge-pill badge-danger">{{ $store.state.num }}</span>
                

                </button>

                <div id="showMenu" v-show="showCart">
                    <div class="container">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ $store.state.num }}</span>
                            </div>

                            <div class="cart-list">

                                <div class="">
                                Hai {{ $store.state.num }} elementi nel carrello
                                </div>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Prezzo</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="plate in $store.state.cart" :key="plate.id">
                                            
                                            <td>
                                                {{ plate.name }}
                                            </td>
                                            <td>
                                                {{ plate.tot }} €
                                            </td>
                                            <td>
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ plate.qty }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <input :id="plate.id" type="number" min="1" placeholder="0" class="button-a">
                                                    <p class="mx-5 pointer" @click="add(plate)"><i class="fas fa-plus"></i></p>
                                                    <p class="pointer" @click="removePlateToCart(plate)"><i class="far fa-trash-alt"></i></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="height:100px">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Totale: {{ $store.state.cartTotal }} € </b></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout checkout-cart-button-container">
                                
                                <router-link :to="{ name: 'checkout' }"><button class="button-b btn btn-success btn-block">Checkout</button></router-link>
                            </div>
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
            showCart: false
        }

    },
    methods: {
        removePlateToCart(plate) {
            let quantity = document.getElementById(plate.id).value;
           
            this.$store.commit('removeFromCart', {plate, quantity});

        },

        add(plate){
           let quantity = document.getElementById(plate.id).value;

           this.$store.commit('addByCart', {plate, quantity});
        }

    }
}
</script>

<style lang="scss" scoped>
    #cart{
        text-align: end;
        margin-bottom: 10px;

        .orange{
            color: white;
            background-color: #f66a24;
        }

        .pointer{
            cursor: pointer;
        }
    }

</style>
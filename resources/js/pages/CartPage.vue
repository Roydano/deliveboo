<template>

    <div class="cart-list">

        <div class="">
           Hai {{ $store.state.num }} elementi nel carrello
        </div>

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Quantità</th>
                    <th>Prezzo</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="plate in $store.state.cart" :key="plate.id">
                    <td>
                        <input :id="plate.id" type="number" min="1" placeholder="Quantità da eliminare" class="button-a">
                        <p @click="removePlateToCart(plate)"><i class="far fa-trash-alt"></i></p>
                    </td>
                    <td>
                        {{ plate.name }}
                    </td>
                    <td>
                        {{ plate.qty }}
                    </td>
                    <td>
                        {{ plate.tot }} €
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
        <div class="checkout-cart-button-container">
           z <button class="button-b">Checkout diretto</button>
        </div>

    </div>

</template>

<script>

export default {

    name: 'CartPage',

    data(){
        return{
            
        }
    },

    mounted() {
        
    },

    methods: {
        removePlateToCart(plate) {
            let quantity = document.getElementById(plate.id).value;
           
            this.$store.commit('removeFromCart', {plate, quantity});

        },

    }

}
</script>

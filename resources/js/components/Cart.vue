<template>
 
    <div class="container">
        <div id="cart" class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn orange" data-toggle="dropdown">

                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    
                    <span class="badge badge-pill badge-danger">{{ $store.state.num }}</span>
                

                </button>

                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ $store.state.num }}</span>
                        </div>

                        <div class="cart-navbar-plate-line" v-for="plate in $store.state.cart" :key="plate.id">
                            <a class="navbar-item" href="#">
                                <span>{{ plate.name }} ({{ plate.qty }} ) </span> <b> {{ plate.tot }} €</b>
                            </a>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">{{ $store.state.cartTotal }} €</span></p>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout checkout-cart-button-container">
                            <router-link :to="{ name: 'cart.page' }"><button class="button-b btn btn-primary btn-block">Vai al carrello</button></router-link>
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
    methods: {
        removePlateToCart(plate) {
           
            this.$store.commit('removeFromCart', {plate});
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
    }

</style>
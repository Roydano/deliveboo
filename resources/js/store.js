import { isNumber } from "lodash";

let already_existent_cart = JSON.parse(window.localStorage.getItem('carrello')); 
let already_existent_num = parseInt(window.localStorage.getItem('numero_elem')); 
let already_existent_cart_total = parseFloat(window.localStorage.getItem('tot_carrello'));

let store_cart = [];
if(already_existent_cart) { 
    store_cart = already_existent_cart;
}

let store = {
    state: { 
        cart: store_cart,
        num: already_existent_num? already_existent_num : 0,
        cartTotal: already_existent_cart_total? already_existent_cart_total : 0,
    },
    mutations: {   

        addToCart(state, plate) { 
            let is_already_in = state.cart.find(elem => elem.id == plate.id);
            if (is_already_in) {
                is_already_in.qty ++;
                is_already_in.tot = is_already_in.price * is_already_in.qty;
            }
            else {
                state.cart.push(plate);
                Vue.set(plate, 'qty', 1);
                Vue.set(plate, 'tot', plate.price);
            }
            state.cartTotal += parseFloat(plate.price);
            state.num++;

            this.commit('saveToLocalStorage'); 
        },

        saveToLocalStorage(state) { 
            window.localStorage.setItem('carrello', JSON.stringify(state.cart));
            window.localStorage.setItem('numero_elem', JSON.stringify(state.num));
            window.localStorage.setItem('tot_carrello', JSON.stringify(state.cartTotal));
        },

        removeFromCart(state, {plate, quantity}) {
            if (!isNumber(parseInt(quantity)) || parseInt(quantity) <= 0) {
                console.log('Error qty');
                return;
            }     

            if((parseInt(plate.qty) - parseInt(quantity) <= 0)){
                state.cart.splice(state.cart.findIndex( el => el.id == plate.id ), 1);
                state.num = state.num - plate.qty;
                state.cartTotal = parseFloat(state.cartTotal) - parseFloat(plate.qty * plate.price);
            } else {               
                let elemIndex = state.cart.findIndex( el => el.id == plate.id );      
                let new_qty = parseInt(plate.qty) - parseInt(quantity);
                state.cart[elemIndex].qty = new_qty;
                state.cart[elemIndex].tot = plate.price * new_qty;
                state.num = state.num - quantity;
                state.cartTotal = parseFloat(state.cartTotal) - parseFloat(quantity * plate.price);
            }
            
            this.commit('saveToLocalStorage');
        }
    }
};

export default store;

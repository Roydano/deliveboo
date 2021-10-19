<template>
  <section class="pb-3">
    <div class="container mt-5 bg-color">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8">
          <form>

          <div class="row pt-5">
            <div class="col-12 col-md-6 col-lg-6 mb-3">
              <input type="name" class="form-control" id="nome" name="nome" v-model="user.nome"  placeholder="Nome" required>
             </div>

            <div class="col-12 col-md-6 col-lg-6 mb-3">
              <input type="name" class="form-control" id="lastname" name="lastname" v-model="user.lastname" placeholder="Cognome" required>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mb-3">
              <input type="email" class="form-control" id="email" name="email" v-model="user.email" placeholder="Email" required>
             </div>

            <div class="col-12 col-md-6 mb-3">
              <input minlength="10" maxlength="10" type="name" placeholder="Numero di telefono" class="form-control" id="phone" name="phone" v-model="user.phone" required>
            </div>
          </div>

          <div class="mb-3 col-12 col-md-9 position-relative">
            <label for="pac-input" class="form-label">Seleziona l'indirizzo di consegna</label>
            <input class="form-control" type="text" id="address" name="address" v-model="user.address" placeholder="Inserisci la tua via" required>
            <div id="map" class="w-100"></div>
          </div>

          <div>
              <button type="submit" class="btn bottone text-decoration-none" v-if=" $store.state.cartTotal === 0 ">Pagamento</button>

              <button  v-else type="submit" class="btn bottone text-decoration-none" @click="payment()">
               

                  <a href="/payment">Payment</a> 
               
              </button>

          </div>

        
         
          
          
        </form>
        </div>

        <div class="col-12 col-md-12 col-lg-4 my-3">
          <div class="mb-2">Riepilogo ordine</div>
          
          <div class="card">
            <table class="tableFull text-center" >
              <thead >
                  <tr>
                      <th>Prodotto</th>
                      <th>Prezzo</th>
                      <th>Quantità</th>
                  </tr>
              </thead>

              <tbody>
                <tr class="card-body text-black w-100" v-for="el in $store.state.cart" :key="el.id">
                  <td class="card-text p-3">
                    {{el.name}}
                  </td>
                  <td class="card-text">
                    {{el.price * el.qty}}€
                  </td>
                  <td class="card-text">
                    {{el.qty}}
                  </td>
                </tr>
                                        
              </tbody>
              

              <tfoot class="text-end">
               
                <tr class="bord">
                  <th></th>
                  <th>Totale</th>
                  <th>{{ $store.state.cartTotal.toFixed(2) }}</th>
                </tr>
              </tfoot>
                                    
            </table>
           
          </div>

          
         
          
          
        </div>

      </div>
    </div>
    
  </section>
</template>

<script>

export default {

  name: 'Checkout',

  data(){
    return{
      user: {
        nome: '',
        lastname: '',
        email: '',
        address: ''
      },
      loader: false
    }
  },

  methods: {
    payment() {

      // oggetto contente user, cart $store.state.cart, loader
      // async laravel-> api VALID _OK, NOT_VALID
      // => 
      
      this.clear();
    

    },

    clear(){
      this.$store.commit('reset')
    }

  }
}
    

</script>

<style lang="scss" scoped>
.bord{
  border-top: 1px solid lightgrey;
}

.padding20{
  padding: 20px;
}
</style>>

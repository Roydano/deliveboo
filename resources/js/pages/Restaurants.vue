<template>
    <div id="back">
        <div class="tit">
            <h2 class=" text-center">Tutti i nostri ristoranti</h2>
        </div>
        <div class="container">
            
            <div class="row">
                

            
         
            

                <div class="col-12 col-md-5 col-lg-3 rest m-1 p-2" data-sr v-for="restaurant in restaurants" :key="restaurant.id">
                   
                    

                    <router-link :to="{name: 'restaurant', params: { slug: restaurant.slug}}">
                        <div class="card">
                            <img class="cover" :src="restaurant.img" :alt="restaurant.name">
                             <div class="card-body">
                                <h5 class="card-title text-center">{{restaurant.name}}</h5>
                                    <p class="card-text">
                                        <span v-for="cuisine in cuisines" :key="cuisine.id">{{cuisine.name}}</span>
                                    </p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>

            <hr>
            
            <p class="text-center pag">Pagina {{currentPage}}</p>

            <div class="row justify-content-center contenitore">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item " :class="{'disabled' : currentPage == 1}">
                            <a class="page-link " href="#" aria-label="Previous" @click="getRestaurants(currentPage - 1)">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" v-for="i in lastPage" :key="i"><a class="page-link" href="#" @click="getRestaurants(i)">{{i}}</a></li>

                        <li class="page-item" :class="{'disabled' : currentPage == lastPage}">
                            <a class="page-link freccia" href="#" aria-label="Next" @click="getRestaurants(currentPage + 1)">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            

        </div>

 
    

    
</template>

<script>

export default {
    name: 'Restaurants',
    data() {
        return {
            apiCall: 'http://localhost:8000/api/restaurants',
            restaurants: [],
            cuisines: [],
            currentPage: [],
            lastPage: []
        }
    },
    created(){
        this.getRestaurants(1);
    },
    methods: {
        getRestaurants(pageRest) {
            axios.get(this.apiCall, {
                params:{
                    page: pageRest
                }
            })
                .then( response => {
                    console.log(response.data.results);
                    this.restaurants = response.data.results.data;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style lang="scss" scoped>
    #back {
        padding-top: 80px;
        min-height: calc(100vh - 80px);
        background: url('https://source.unsplash.com/GXXYkSwndP4/1600x900');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover; 
        box-shadow: inset 0 0 0 50vw rgba(0, 0, 0, 0.5);
        font-style:italic;
    }
    .container {
        overflow-y: hidden;
    }

    h1 {
        background-color: white;
        position: fixed;
        top: 80px;
        z-index: 9;
    }

    .rests {
        margin-top: 50px;
        overflow-y: auto;
        max-height: calc(100vh - 70px);
    }

  
    .card{
         background-color: rgba(0, 0, 0, 0.8);
         padding: 10px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         text-align: center;
         height:200px;
         font-style:italic;
           &:hover {
             transform: translateY(5px);
             background-color:#007bff;
             opacity: 0.6;
             transition:0.5s ease-in-out;
             color:white;
             
         }
     }

    


       
        h2{
           padding-bottom:10px;
           color: white;
           font-style:italic;
            
          

            
        }
        .row{
            justify-content: center;
        }
       
        a{
            text-decoration:none;
        }


        // paginate

        nav a 
        
        {
            background-color: rgb(0, 0, 0 , 0.6);
            
        }
       

        .freccia{
          background-color: white;
        }

        .pag{
            color:white;

        }
      
    
</style>
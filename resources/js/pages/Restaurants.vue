<template>
    <div id="back">
        <div class="tit">
            <h2 class=" text-center">Tutti i nostri ristoranti</h2>
        </div>
       <div class="container text-white">

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
        <div v-for="restaurant in restaurants" :key="restaurant.id" class="p-3 restaurant ">
            <div class="card_restaurant text-white">
                <div class="cover_cont">

                    <router-link :to="{name: 'restaurant', params: { slug: restaurant.slug}}">
                        <img :src="restaurant.img" :alt="restaurant.id" class="restaurantImg">
                    </router-link>
                    
                    <div class="icons">
                        <router-link :to="{name: 'restaurant', params: { slug: restaurant.slug}}"><i class="fas fa-eye show"></i></router-link>
                    </div>

                    <div class="text-uppercase name"><span>{{restaurant.name}}</span></div>
                    
                </div>

                <div class="infos">

                    <div class="descr mt-2 mb-3 px-4">{{restaurant.address}}</div>
                    <div class="descr mt-2 mb-3 px-4">{{restaurant.phone}}</div>
                </div>
                
            </div>
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

  
    // .card{
    //      background-color:rgba(0, 0, 0, 0.5);
    //      padding: 10px;
    //      display: flex;
    //      flex-direction: column;
    //      justify-content: center;
    //      align-items: center;
    //      text-align: center;
         
    //      font-style:italic;
        


    //        &:hover {
    //          transform: translateY(5px);
    //          background-color:#007bff;
    //          opacity: 0.6;
    //          transition:0.5s ease-in-out;
    //          color:white;
             
    //      }
    //  }

    


       
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


        // immagine ristorante

        .cover{
            width:80%;
            padding-top:10px;
            font-size:22px;
            height:150px;
        }

        h5{
            font-size:10px;
        }




        .card_restaurant {
        padding: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        transition: all 0.3s ease-in-out;
        &:hover {
            transform: translateY(-5px);
        }
    }
    .card_restaurant:hover .icons {
        display: inline;
    }
    .card_restaurant:hover .restaurantImg {
        filter: brightness(120%);
    }
    .restaurantImg {
        width: 100%;
        height:180px;
        object-fit: cover;
        object-position: center;
        transition: all 0.2s linear;
    }
    .cover_cont {
        position: relative;
        .icons {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            transition: all 0.3s ease-in-out;
            a, a:hover {
                color: rgba($color: #FFF, $alpha: 0.8);
            }
        }
    }
    .name {
        text-align:center;
        position: absolute;
        bottom: -5px;
        padding: 5px 10px;
        padding-top: 40px;
        width: 100%;
        background: rgb(0,0,0);
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 40%, rgba(0,0,0,1) 100%);
        font-size: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .infos {
        background: rgb(0,0,0);
        background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.7) 50%, rgba(0,0,0,1) 100%);
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        
        .descr {
            font-style: italic;
            font-size: 0.8rem;
            text-align: center;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow:hidden;

    }
    }

    .showrestaurant {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99;
        display: flex;
        justify-content: center;
        align-items: center;
    }
      
    
</style>
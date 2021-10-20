<template>
    <div>
         <div class="container-fluid"  v-if="cuisineSelect != '' " >

            <h3>Cucina {{ cuisineSelect }}</h3>

            <div class="row  mt-5 text-center" >
                
                <div v-for="restaurant in restaurants" :key="restaurant.id">

                    <router-link :to="{name: 'restaurant', params:{slug: restaurant.slug}}">

                        <div  class="card  carta   text-white  " style="width: 20rem; ">
                             <img class="cover" :src="'storage/' + restaurant.img" :alt="restaurant.name"> 
                            <div class=" card_plate card-body">
                                <h5 class="card-title">{{ restaurant.name }}</h5>
                                <span>{{restaurant.address}}</span>
                                <span class="phone"> Telefono :{{restaurant.phone}}</span>
                               
                        
                            </div>
                        </div>

                    </router-link>

                </div>
            </div>

            
        </div> 
          <div v-else class="container">
             <div  class="row">
               <div class="col-12">
                 <h2 class="scegli">Seleziona la cucina desiderata</h2>

               </div>
           

            </div>
         </div>
     

        
    </div>
</template>

<script>
export default {
    name: 'CardRestaurant',
    props:['cuisineSelect', 'restaurants'],
}
</script>

<style lang="scss" scoped>
*{
    text-decoration:none;
    
}
h5{
    color:white;
    text-decoration:none;
    margin-top:25px;
    text-transform:uppercase;
     transition: 0.5s ease-in-out;
     transition-property: color;

    
}
h5:hover{
    text-decoration:none;
    border:none;
    color:black;
    
    
    transition:0.2s;
}

#h5 {transition-timing-function: ease-out;}


//  .card_plate {
//      background-color: rgba(0, 0, 0, 0.8);
//      padding: 10px;
//      display: flex;
//      flex-direction: column;
//      justify-content: center;
//      align-items: center;
//      text-align: center;
       
//     }
 
    .carta{
        margin-left:70px;
        margin-bottom:40px;
        
     
    }
    .card_plate{
          
         background-color: rgba(0, 0, 0, 0.8);
         padding: 10px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         text-align: center;
         height:150px;
         font-style:italic;
           &:hover {
             transform: translateY(5px);
             background-color:white;
             opacity: 0.6;
             transition:0.5s ease-in-out;
             color:black;
             h5{
                 color:black;
             }
           }  
         
    }

h3{
    color:white;
}
.phone{
    font-size:10px;

}
.scegli{
       background-color: rgba(0, 0, 0, 0.8);
       padding: 20px;
       display: flex;
       flex-direction: column;
       justify-content: center;
        align-items: center;
        text-align: center;
        color:white;

    }

    a{
        text-decoration:none;    
    }

    .cover{
        height:250px;
    }




   




</style>
<template>
<!-- cuisine.vue -->
<div class="bg" :style="{'background-image': 'url(/storage/img/' + cuisine.slug + '.jpg)' }">
<div class="over">

<div class="nome mb-2 text-center text-white px-3">Cucina {{cuisine.name}}</div>

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
</div>
</div>

</template>

<script>
export default {
  name: "Cuisine",
  data() {
    return {
      restaurants: [],
      cuisine: "",
    };
  },

   mounted() {
       this.getInfo();
       this.getName();
   },
   methods: {
       getInfo(){
           axios.get("http://localhost:8000/api/cuisines/" + this.$route.params.slug)
                .then((response) => {
                    console.log(this.$route.params.slug)
                this.restaurants = response.data.results;
        });
    },

      getName(){
       axios.get("http://localhost:8000/api/getName/" + this.$route.params.slug)
          .then((response) => {
               this.cuisine = response.data.results;
            });
       }
   }
 }
</script>

<style lang="scss" scoped>
.bg {
    background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
        box-shadow: inset 0 0 0 50vw rgba(0, 0, 0, 0.5);
}

.over {
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.4) 30%, rgba(0,0,0,0.7) 100%);
}
    .nome{
        font-size: 2.3rem;
        
        padding: 1rem 0;
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

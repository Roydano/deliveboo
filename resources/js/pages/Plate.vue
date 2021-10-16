<template>
    <div class="cont">

        <main class="w-100 d-flex justify-content-around align-items-center">

            <router-link :to="{name: showPlate, params:{slugCourse: prevCourse, slugPlate: prevPlateSlug}}"><img src="/storage/img/chevron-l.svg" alt="chevron left" class="chevron"></router-link>

            
            <div  class="plate-cont" v-bind:style="{backgroundImage: 'url(' + plate.img + ')'}">

                <div v-click-outside="onClickOutside" class="box text-center text-white">

                    <div class="name">{{plate.name}}</div>

                    <div class="descr text-center my-3">
                        {{plate.description}}
                    </div>

                    <div class="info text-center">
                        <h6 class="infotitle">Ingredienti</h6>
                        {{plate.ingredients}}
                        <h6 class="infotitle mt-2">Prezzo</h6>
                        {{plate.price}}€
                    </div>
                </div>
            
            </div>

            <router-link :to="{name: showPlate, params:{slugCourse: nextCourse, slugPlate: nextPlateSlug}}">
                <img src="/storage/img/chevron-r.svg" alt="chevron right" class="chevron">
            </router-link>

        </main>
        
        
        <div class="actions">

            <div v-popover:links.left>
                <img class="icon" src="/storage/img/share.svg" alt="share icon">
            </div>
            <img class="icon" src="/storage/img/add-to-cart.png" alt="cart icon">
            
            <popover name="links">
                <Facebook :url="'www.wannaeat.com' + $route.fullPath" scale="2"/>
                <Telegram :url="'www.wannaeat.com' + $route.fullPath" scale="2"/>
                <WhatsApp :url="'www.wannaeat.com' + $route.fullPath" scale="2"/>
            </popover>
            
        </div>
    </div>
  
</template>

<script>
import { Facebook } from 'vue-socialmedia-share';
import { Telegram } from 'vue-socialmedia-share';
import { WhatsApp } from 'vue-socialmedia-share';
export default {
  name: 'Plate',
  components: {
      Facebook,
      Telegram,
      WhatsApp
  },
  data() {
    return {
      plate: [],
      prevPlateSlug: [],
      nextPlateSlug: [],
      prevCourse: [],
      nextCourse: [],
      open: false
    };
  },
  mounted() {
    this.getPlate();
    this.getPrev();
    this.getNext();
    this.wait();
    },
    methods: {
        wait() {
            console.log('wait');
            setTimeout(()=>{
            this.open = true;
            },1000);
        },
        onClickOutside () {
            console.log(this.open);
            if (this.open) {
               this.$router.push({ name: 'showMenu', params: { slug: this.$route.params.slug, slugCourse: this.$route.params.slugCourse } })
            }
        },
        getPlate() {
            axios.get('http://localhost:8000/api/plates/' + this.$route.params.slugPlate)
                .then( response => {
                    this.plate = response.data.results;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getPrev() {
            axios.get('http://localhost:8000/api/prevPlate/' + this.$route.params.slugPlate)
                .then( response => {
                    this.prevPlateSlug = response.data.results.plate;
                    this.prevCourse = response.data.results.course;
                } )
                .catch(error => {
                    console.log(error);
                });
        },
        getNext() {
            axios.get('http://localhost:8000/api/nextPlate/' + this.$route.params.slugPlate)
                .then( response => {
                    this.nextPlateSlug = response.data.results.plate;
                    this.nextCourse = response.data.results.course;
                } )
                .catch(error => {
                    console.log(error);
                });
        }
            
    }

}
</script>

<style lang="scss" scoped>
    .cont {
        background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.9) 100%);
        width: 100vw;
        height: 100vh;
        z-index: 99;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
    }

    .plate-cont {
        width: 60vw;
        height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-size: cover;
        background-position: center;
        border-radius: 15px;
        padding: 30px;
        .box {
            background-color: rgba($color: #000000, $alpha: 0.6);
            padding: 10px 20px;
            width: 80%;
            height: 80%;
            overflow-y: auto;
            border-radius: 15px;
            .info {
                font-size: 14px;
            }
            .descr {
                font-size: 14px;
                font-style: italic;
            }
            .name {
                font-size: 2rem;
            }
        }
    }

    .actions {
        width: 40%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        
    }

    [data-popover="links"] {
        display: flex;
        justify-content: space-around;
        * {
            cursor: pointer;
        }
    }

    .icon, .chevron {
            filter: invert(1) opacity(0.8);
            cursor: pointer;
            transition: all .2s ease-in-out;
            &:hover {
                filter: invert(1) opacity(1);
            }
    }

    .icon {
        height: 3rem;
        &:hover {
                transform: rotateY(180deg);
        }
    }

    .chevron {
        height: 4rem;
        &:hover {
            transform: scale(1.1);
        }
    }
</style>

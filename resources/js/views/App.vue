<template>

    <div class="body">
        <Header/>
        <Main/>
        <Footer v-if="$route.meta.footer"/>
    </div>
        
</template>

<script>
import Header from '../components/Header';
import Main from '../components/Main';
import Footer from '../components/Footer';

export default {
    name: "App",
    components: {
        Header,
        Main,
        Footer
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/commons';
 .body{
     background-color:black;
     font-family: montserrat !important;
 }

</style>
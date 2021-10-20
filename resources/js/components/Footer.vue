<template>
    <div class="body">
        <footer>
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>



            </div>
            <ul class="social_icon">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>

            </ul>
      

            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="/restaurants">Ristoranti</a></li>
                <li><a href="#cuisines">Cucine</a></li>
                <li><a href="/register">Registrati</a></li>
                <li><a href="/login">Login</a></li>
                

            </ul>

            <p>© 2021 Wanna Eat | Official site </p>


        </footer>

    </div>
</template>


<script>

export default {
    name: 'Footer',
}
</script>

<style lang="scss" scoped>

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-style:italic;
}

.body{
    display:flex;
    justify-content:flex-end;
    align-items:flex-end;
    
    background:black;
    padding-top:130px;
}

footer{
    position:relative;
    width:100%;
    background:#3586ff;
    min-height:100px;
    padding:20px 50px;
    display:flex;
    justify-content: center;
    align-items:center;
    flex-direction: column;


}

footer .social_icon , footer .menu{
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    margin: 10px 0;

}

footer .social_icon li ,
footer .menu li
{
    list-style:none;

}

footer .social_icon li a

{
    font-size:2em;
    color: #fff;
    margin: 0 10px;
    display:inline-block;
    transition:0.5s;


}

footer .social_icon li a:hover{
   transform: translateY(-10px);
}

footer .menu li a
{
    font-size: 1.2em;
    color: #fff;
    margin: 0 10px;
    display:inline-block;
    text-decoration:none;
    opacity:0.65;

}
footer .menu li a:hover{
   opacity:1;
}

footer p{
   color:#fff;
   text-align:center;
   margin-top:15px;
   margin-bottom: 10px;
   font-size: 1.1em;
}


// wave

footer .wave{
    position:absolute;
    top:-100px;
    left:0px;
    width:100%;
    height:100px;
    background:url('/img/wave.png');
    
    background-size: 1000px 100px;
    

}

footer .wave#wave1{
    z-index:1;
    opacity:1;
    bottom:0;
    animation: animateWave_02 4s linear infinite;
}
footer .wave#wave2{
    z-index:999;
    opacity:0.5;
    bottom: 10px;
    animation: animateWave 4s linear infinite;
}

footer .wave#wave3{
    z-index:1000;
    opacity:0.2;
    bottom: 15px;
    animation: animateWave_02 3s linear infinite;
}
footer .wave#wave4{
    z-index:999;
    opacity:0.7;
    bottom: 20px;
    animation: animateWave 3s linear infinite;
}

@keyframes animateWave
{
   0%
   {
      background-position-x: 1000px; 
   } 
   100%
   {
       background-position-x: 0px;
   }
}

@keyframes animateWave_02
{
   0%
   {
      background-position-x: 0px; 
   } 
   100%
   {
       background-position-x: 1000px;
   }
}


</style>
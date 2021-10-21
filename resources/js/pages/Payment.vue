<template>
    
    <div class="pay-sfondo text-center"> 
        <h1 class="pay-tit mb-2">Ordine effettuato con successo <i class="far fa-thumbs-up"></i></h1>
        <img class="pupo"  src="storage/img/deliver.png" alt="">
        <h4 class="text-white">Grazie per aver ordinato da Wanna Eat, il tuo ordine verrà consegnato il prima possibile!</h4>
        <button class="btn back-to-home"><a href="/">Torna alla home</a></button>
    </div>
</template>

<script>



export default {
    name: "Payment"
}
   
</script>

<style lang="scss" scoped>
*{
    font-style:italic;
}
.pay-sfondo{
    width:100vw;
    height:100vh;
    background-color:rgb(0, 183, 255);
    overflow: hidden;
}

.pay-tit{
    margin-top: 8%;
    color:white;
}

img{
    height:450px;
   
}
button{
    padding:10px;
    border-radius:10%;
    margin-top: 400px;
    
}

button:hover a{
    text-decoration:none;
    color:white;
    background-color: rgba(0, 0, 0, 0.6);
    padding:10px;
    border-radius:12px;
    
   
     
}
a{
    text-decoration:none;
    color:white;
}

.pupo {
    animation: pupo 6s ease-out infinite ;
    position: absolute;
    left: 0;
    top: 220px;
    height: 350px;
    margin: 50px;
}

@keyframes pupo {
   0% {
       left: o;
       top: 220px;
   }
   100% {
      left: 71%;
      top: 220px;
   }
}


.back-to-home a{
    font-size:23px;
    transition:0.5s;

}

</style>
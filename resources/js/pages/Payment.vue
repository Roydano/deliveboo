<template>
    
    <div class="pay-sfondo text-center"> 
        <h1 class="pay-tit">Pagamento effettuato con successo</h1>
        <div class="road">
            <img class="pupo"  src="storage/img/deliver.png" alt="">
        </div>
        <h4 class="text-white">Grazie per aver ordinato da Wanna Eat, il tuo ordine verrà consegnato il prima possibile</h4>
        <button class="btn"><a href="/">Torna alla home</a></button>
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
    background-color: black;
    overflow-x: hidden;
    overflow-y: hidden;
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
    color:#66b1f2;
    
   
     
}
a{
    text-decoration:none;
    color:white;
}

.road {}

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
      left: 77%;
      top: 220px;
   }
}

</style>
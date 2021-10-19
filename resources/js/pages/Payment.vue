<template>
    
    <div class="pay-sfondo text-center"> 
        <h1 class="pay-tit">Pagamento effettuato con successo</h1>
        <img  src="storage/img/deliver.png" alt="">
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
    margin-top:30px;
    
}

button:hover a{
    text-decoration:none;
    color:#66b1f2;
    
   
     
}
a{
    text-decoration:none;
    color:white;
}


</style>
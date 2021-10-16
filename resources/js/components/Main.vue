<template>
    <div>
        
                <router-view >
                        
                </router-view>
    </div>
</template>

<script>


export default {
    name: 'Main',
}




</script>
<style lang="scss" scoped>

    * {
        overflow-x: hidden;
    }




*{
    margin:0;
    padding:0;
    box-sizing: border-box;

}
.body{
    background: #17a2b8;
    

}
.swrapper{
    
    width:100%;
    margin:130px auto;
    background: #fff;
    padding: 25px 30px 30px 30px;
    border-radius: 5px;

}

.swrapper header{
    font-size: 30px;
    font-weight:600;
    margin-bottom: 20px;
}

.swrapper nav{
    position:relative;
    height: 50px;
    width:100%;
    display:flex;
    align-items:center;
   

}

.swrapper nav label{
    display:block;
    height:100%;
    width:100%;
    text-align:center;
    line-height:50px;
    cursor: pointer;
    color:#17a2b8;
    font-size:17px;
    z-index:1;
    position:relative;
    transition: all 0.3s ease;
    


}


#home:checked ~ nav label.home{
    color:#fff;

}
#blog:checked ~ nav label.blog{
    color:#fff;

}
#code:checked ~ nav label.code{
    color:#fff;

}
#help:checked ~ nav label.help{
    color:#fff;

}
#about:checked ~ nav label.about{
    color:#fff;

}
#greca:checked ~ nav label.greca{
    color:#fff;

}
#cinese:checked ~ nav label.cinese{
    color:#fff;

}
#libanese:checked ~ nav label.libanese{
    color:#fff;

}
#messicana:checked ~ nav label.messicana{
    color:#fff;

}
#pizza:checked ~ nav label.pizza{
    color:#fff;

}
#thailandese:checked ~ nav label.thailandese{
    color:#fff;

}
#vegetariana:checked ~ nav label.vegetariana{
    color:#fff;

}
#vegana:checked ~ nav label.vegana{
    color:#fff;

}

input[type="radio"]{
    display:none;
}
.swrapper nav .slider{
    position:absolute;
    height:100%;
    width:7%;
    background-color:black;
    opacity:0.9;
    border-radius:5px;
    z-index: 0;
    left: 0;
    bottom: 0;
    transition: all 0.3s ease;


}


#blog:checked ~ nav .slider{
    left: 7.8%;

}
#code:checked ~ nav .slider{
    left: 15.7%;
    
}
#help:checked ~ nav .slider{
    left: 23.5%;
    
}
#about:checked ~ nav .slider{
    left: 31.1%;
    
}
#greca:checked ~ nav .slider{
    left: 39%;
    
}
#cinese:checked ~ nav .slider{
    left: 46.6%;
    
}

#libanese:checked ~ nav .slider{
    left: 54%;
    
}
#messicana:checked ~ nav .slider{
    left: 61.8%;
    
}
#pizza:checked ~ nav .slider{
    left: 69.5%;
    
}
#thailandese:checked ~ nav .slider{
    left: 77.3%;
    
}
#vegetariana:checked ~ nav .slider{
    left: 84.9%;
    
}
#vegana:checked ~ nav .slider{
    left: 92.5%;
    
}


section .content{
    display:none;
}


#home:checked ~ section .content-1{
    display:block;

}

#blog:checked ~ section .content-2{
    display:block;
    
}
#code:checked ~ section .content-3{
    display:block;
    
}
#help:checked ~ section .content-4{
    display:block;
    
}
#about:checked ~ section .content-5{
    display:block;
    
}

#greca:checked ~ section .content-6{
    display:block;
}
#cinese:checked ~ section .content-7{
    display:block;
}
#libanese:checked ~ section .content-8{
    display:block;
}
#messicana:checked ~ section .content-9{
    display:block;
}

#pizza:checked ~ section .content-10{
    display:block;
}

#thailandese:checked ~ section .content-11{
    display:block;
}

#vegetariana:checked ~ section .content-12{
    display:block;
}

#vegana:checked ~ section .content-13{
    display:block;
}




   
section .content .title{
    font-size:21px;
    font-weight:500;
    margin:30px 0 10px 0;


}

</style>



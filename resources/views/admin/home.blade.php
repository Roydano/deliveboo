@extends('layouts.app')

@section('content')



<!-- qui modificare dashboard -->

<!-- <div class="container-fluid">
    
    <div class="row">
        @auth
        <nav class="col-md-4 d-none d-md-block h_100 sidebar py-4">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active white" href="{{ route('admin.index') }}">
                            <i class="fas fa-house-user"></i>
                            I tuo Dati
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active white" href="{{ route('admin.plates.index')}}">
                            <i class="fas fa-utensils"></i>
                            I tuoi Piatti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white" href="{{ route('admin.plates.create') }}">
                            <i class="fas fa-plus"></i>
                            Aggiungi un nuovo Piatto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white" href="">
                            <i class="far fa-bell"></i>
                            Ordini Ricevuti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white" href="">
                            <i class="fas fa-chart-pie"></i>
                            Statistiche Ordini
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        @endauth


        
        <div class="card mb-3" style="max-width: 540px;">
            
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid rounded-start" alt="{{ $restaurant->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Ristorante: {{ $restaurant->name }}</h5>
                        <p class="card-text"><b>Indirizzo:</b> {{ $restaurant->address}}</p>
                        <p class="card-text"><b>Numero di telefono:</b> {{ $restaurant->phone}}</p>
                        <p class="card-text"><b>P.IVA:</b> {{ $restaurant->p_iva}}</p>
                    </div>
                </div>
            </div>
        </div>
    

    
        
    </div>
</div> -->

<div class="body">

<!-- wrapper start -->

   <div class="wrapper">

     <!-- header menu start -->

     <input type="checkbox" id="check">

     <div class="header">
         <label for="check">
                 <i class="fas fa-bars" id="sidebar_btn"></i>
                
         </label>
         <div class="header-menu">
             <div class="title">Wanna Eat</div>
           

             <ul>

               <li><a href=""><i class="fas fa-search"></i></a></li>
               <li><a href=""><i class="fas fa-bell"></i></a></li>
               <li><a href=""><i class="fas fa-power-off"></i></a></li>
             </ul>


         </div>

     </div>


     <!-- header menu end -->

     <!-- sidebar start -->

       <div class="sidebar">
           <div class="sidebar-menu">
               <center class="profile">

                  <img src="./img/frutta.jpg" alt="">
                  <h5 class="card-title"> {{ $restaurant->name }}</h5>


               </center>

               <li class="item">
                   <a href="{{ route('admin.index') }}" class="menu-btn">
                      <i class="fas fa-desktop"></i><span>Dashboard</span>



                   </a>
               </li>

               <li class="item" id="profile">
                   <a href="#profile" class="menu-btn">
                      <i class="fas fa-utensils"></i><span>Piatti  <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>

                        <div class="sub-menu">
                            <a href="{{ route('admin.plates.index')}}"><i class="fas-fa-image"></i><p>Mostra </p></a>
                            <a href="{{ route('admin.plates.create') }}"><i class="fas-fa-address-card"></i><p>Aggiungi</p></a>
                           

                        </div>
                </li>
                
               <li class="item" id="messages">
                   <a href="#messages" class="menu-btn">
                      <i class="fas fa-envelope"></i><span>Ordini  <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>

                        <div class="sub-menu">
                            <a href=""><i class="fas-fa-envelope"></i><p>Ricevuti</p></a>
                            <a href=""><i class="fas-fa-envelope-square"></i><p>Statistiche</p></a>
                            

                        </div>
                </li>
                
               <!-- <li class="item" id="settings">
                   <a href="#settings" class="menu-btn">
                      <i class="fas fa-user-circle"></i><span>Settings  <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>

                        <div class="sub-menu">
                            <a href=""><i class="fas-fa-lock"></i><span>Password</span></a>
                            <a href=""><i class="fas-fa-language"></i><span>Language</span></a>

                        </div>

                </li> -->

               <li class="item">
                 <a href="#" class="menu-btn">
                   <i class="fas fa-info-circle"></i><span>Info</span>
                 </a>
              
                </li>
           </div>

       </div>


     <!-- sidebar end -->

     <!-- main container start -->


     <div class="main-container">
     <div class="card mb-3" style="max-width: 540px;">
            
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid rounded-start" alt="{{ $restaurant->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Ristorante: {{ $restaurant->name }}</h5>
                        <p class="card-text"><b>Indirizzo:</b> {{ $restaurant->address}}</p>
                        <p class="card-text"><b>Numero di telefono:</b> {{ $restaurant->phone}}</p>
                        <p class="card-text"><b>P.IVA:</b> {{ $restaurant->p_iva}}</p>
                    </div>
                </div>
            </div>
        </div>
       

     </div>

     <!-- main container end -->


   </div>

<!-- wrapper end -->


</div>


<style>

    *{
      margin:0;
      padding:0;
      list-style:none;
      text-decoration:none;
      box-sizing:border-box;
      font-family: "Roboto", sans-serif; 
    }
   

    .body{
        background:#fff;

    }
    h5{
        color:white;
    }
    .tendina{
        color:white;
    }
    

    .wrapper .header{
        z-index:1;
        background:#22242A;
        position:fixed;
        width:calc(100% - 0%);
        height:70px;
        display:flex;
        top:0;


    }
    .wrapper .header .header-menu{
        width: calc(100% - 0%);
        height:100%;
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding: 0 20px;


    }

    .wrapper .header .header-menu .title{
        color:#fff;
        font-size: 25px;
        text-transform: uppercase;
        font-weight: 900;
    }
    .wrapper .header .header-menu .title span{
        color:#4CCEE8;

    }
    .wrapper .header .header-menu .title .sidebar-btn{
        color:#fff;
        position:absolute;
        margin-left:240px;
        font-size:22px;
        font-weight:900;
        cursor:pointer;
        transition: 0.3 s;
        transition-property: color;

    }
    .wrapper .header .header-menu .title .sidebar-btn:hover{
        color:#4CCEE8; 
    }

    .wrapper .header .header-menu ul{
        display:flex;
    }
    .wrapper .header .header-menu ul li a{

        background: #fff;
        color:#000;
        display:block;
        margin: 0 10px;
        font-size: 18px;
        width:34px;
        height:34px;
        line-height:35px;
        text-align:center;
        border-radius:50%;
        transition:0.3s;
        transition-property: background, color;
 }

   .wrapper .header .header-menu ul li a:hover{
       background:#4CCEE8;
       color:#fff;

   }


   .wrapper .sidebar{
       z-index: 1;
       background: #2F323A;
       position:fixed;
       top:70px;
       width:250px;
       height: calc(100% - 9%);
       /* transition: 0.3s;
       transition-property: width; */
       overflow-y: auto;
       


   }
   .sidebar{
       transition:0.5s;
       transition-property:left;

   }

   .wrapper .sidebar .sidebar-menu{
       overflow:hidden;
   } 

   .wrapper .sidebar .sidebar-menu .profile img{
       margin: 20px 0;
       width: 100px;
       height:100px;
       border-radius: 50%;
   }

   .wrapper .sidebar .sidebar-menu .profile p{
       color: #bbb;
       font-weight: 700;
        margin-bottom:10px;

   }

   .wrapper .sidebar .sidebar-menu .item{
       width:250px;
       overflow:hidden;

   }
   .wrapper .sidebar .sidebar-menu .item .menu-btn{
       display:block;
       color:#fff;
       position:relative;
       padding:25px 20px;
       transition:0.3s;
       transition-property: color;

   }

   .wrapper .sidebar .sidebar-menu .item .menu-btn:hover{
        color: #4CCEE8;
        text-decoration:none;

   }

   .wrapper .sidebar .sidebar-menu .item .menu-btn i{
       margin-right:20px;

   }

   .wrapper .sidebar .sidebar-menu .item .menu-btn .drop-down{
        float:right;
        font-size:12px;
        margin-top: 3px;
   }

   .wrapper .sidebar .sidebar-menu .item .sub-menu{
       background: #3498DB;
       overflow: hidden;
       max-height: 0;
       transition :0.3s;
       transition-property: background, max-height;

   }

   .wrapper .sidebar .sidebar-menu .item .sub-menu a{
       display:block;
       position:relative;
       color: #fff;
       white-space: nowrap;
       font-size:15px;
       padding:20px;
       border-bottom: 1px solid #8FC5E9;
       transition: 0.3s;
       transition-property:background;
   }

   .wrapper .sidebar .sidebar-menu .item .sub-menu a:hover{
       background: #55b1F0;

   }

   .wrapper .sidebar .sidebar-menu .item .sub-menu i{
       padding-right:20px;
       font-size: 10px;

   }

   .wrapper .sidebar .sidebar-menu .item:target .sub-menu{
       max-height:500px;

   }
   /* .wrapper .main-container{
       width (100% - 250px);
       
       margin-left:250px;
      
       
       
       height: 100vh;
       transition:0.3s;
      

   }
    .main-container .immagine{
    background: url(./img/forch.jpg)no-repeat;
    height:100vh;
    width:100%;
    background-size:cover;

   } */
   .main-container{
       margin-left:30%;
   }

   /* tendina */


   label #sidebar_btn{
       z-index:1;
       color:#fff;
       position:fixed;
       cursor:pointer;
       left:200px;
       font-size:20px;
       margin:25px 0;
       transition: 0.5s;
       transition-property: color;



   }

   label #sidebar_btn:hover{
       color: #19B3D3;

   }
   #check:checked ~ .sidebar{
       left: -175px;
   }

   #check:checked ~ .sidebar a span{
       display:none;

   }

   #check:checked ~ .sidebar a
   {
     
     margin-left:170px;
     width:80px;
     
   }

   #check:checked ~ .sidebar a p{

    font-size:10px;
    max-width:50px;
    margin-left:-9px;
    
   }
   .sidebar i{
       font-size:18px;
   }
   .sidebar span{
       font-size:18px;
   }
   #check:checked ~ .sidebar i{
    
     
       width:80px;
      font-size:25px;
      margin-left:5px;
      
   }
 






   
   
</style>
   

@endsection


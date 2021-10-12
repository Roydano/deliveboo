@extends('layouts.app')

@section('content')



<!-- qui modificare dashboard -->


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
        <div class="title"><a class="no-style" href="{{ url('/') }}">Wanna Eat</a></div>
        

            <ul>

            <li><a href=""><i class="fas fa-bell"></i></a></li>
            <li>
                <a href="{{ url('/') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            </ul>


        </div>

     </div>


     <!-- header menu end -->

     <!-- sidebar start -->

       <div class="sidebar">
           <div class="sidebar-menu">
               <center class="profile pt-3">

                  <img src="./img/frutta.jpg" alt="">
                  <h5 class="card-title scritta"> {{ $restaurant->name }}</h5>


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
     <!-- <div class="card mb-3" style="max-width: 540px;">
            
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
        </div> -->

        <!-- inizio card -->


        <div class="card-dash">
            <div class="card-image"></div>
            <div class="card-text">
                <span class="date">Ristorante: {{ $restaurant->name }}</span>
                <p> <b>Indirizzo:</b>{{ $restaurant->address}}</p>
                <p>Numero di telefono:</b> {{ $restaurant->phone}}</p>
            </div>
            <div class="card-stats">
                <div class="stat">
                    <a href="{{ route('admin.plates.index')}}"><div class="value">Piatti </div></a>
                    
                    <div class="type"><i class="fas fa-utensils"></i></div>
                </div>
                <div class="stat border">
                <a href=""><div class="value">Ordini </div></a>
                    <div class="type"><i class="fas fa-envelope"></i></div>
                </div>
                <div class="stat">
                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <div class="value">Logout </div></a> 
                                        <div class="type"><i class="fas fa-power-off"></i></div> 
                                       
                                    
                                    
                </div>

                 <!-- <a href="{{ route('logout') }}"><div class="value">Logout </div></a>  -->
                    
                    <!-- <div class="type"><i class="fas fa-power-off"></i></div> -->
                </div>
            </div>

          

      
       

     </div>
    

          

      
       

     </div>
       <!-- fine card -->

     <!-- main container end -->


   </div>

<!-- wrapper end -->


</div>
@endsection


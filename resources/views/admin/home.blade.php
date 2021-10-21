@extends('layouts.app')

@section('content')



<!-- qui modificare dashboard -->


<div class="body">

<!-- wrapper start -->

   <div class="wrapper">

        <div class="sidebar">
            <div class="sidebar-menu">
               <center class="profile pt-3">

                  <img src="storage/{{$restaurant->img}}" alt="">
                  
                  <h5 class="card-title scritta "> {{ $restaurant->name }}</h5>
                </center>

               <li class="item">
                   <a href="{{ route('admin.index') }}" class="menu-btn">
                      <i class="fas fa-desktop"></i><span>Dashboard</span>
                   </a>
               </li>

               <li class="item" id="profile">
                   <a href="#profile" class="menu-btn" href="#" role="button" id="dropdownMenuLink">
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

               <li class="item">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-info-circle"></i><span>Info</span>
                    </a>
                </li>
            </div>
        </div>
     <!-- sidebar end -->


     <!-- main container start -->
     <div style="background-image: url('storage/{{$restaurant->img}}')" class="main-container">


        <!-- inizio card -->
        <div class="card-dash">
            <div class="card-text">
                <span class="date">{{ $restaurant->name }}</span>
                <p>{{ $restaurant->address}}</p>
                <p>{{ $restaurant->phone}}</p>
                <p>P. Iva: {{ $restaurant->p_iva}}</p>
            </div>
            <div class="card-stats">
                <div class="stat">
                    <a href="{{ route('admin.plates.index')}}"><div class="value">Piatti </div></a>
                    
                    <div class="type"><i class="fas fa-utensils"></i></div>
                </div>
                <div class="stat">
                <a href=""><div class="value">Ordini </div></a>
                    <div class="type"><i class="fas fa-envelope"></i></div>
                </div>
                <div class="stat">
                    <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <div class="value">Logout </div>
                    </a> 
                    <div class="type"><i class="fas fa-power-off"></i></div>
                </div>

                 <!-- <a href="{{ route('logout') }}"><div class="value">Logout </div></a>  -->
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

<style scoped>
body {
    overflow: hidden;
    font-family:montserrat !important;
}
</style>
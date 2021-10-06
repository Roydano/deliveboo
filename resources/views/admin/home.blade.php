@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
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
</div>
   

@endsection


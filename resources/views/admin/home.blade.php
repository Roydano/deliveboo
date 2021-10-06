@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Benvenuto Ristorante {{ $restaurant->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ti sei loggato con successo!') }}
                </div>
                <div class="card-body">
                    <div>{{ $restaurant->name  }}</div>
                    <div>{{ $restaurant->address  }}</div>
                    <div> id del ristorante : {{ $restaurant->id  }} </div>
                    
                    <a href="{{ route('admin.plates.index')}}">vedi i tuoi piatti</a>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

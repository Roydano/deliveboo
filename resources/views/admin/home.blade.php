@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Benvenuto Ristorante {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div>{{ $restaurant->name  }}</div>
                    <div>{{ $restaurant->address  }}</div>
                    <div>{{ $restaurant->id  }} questo è l'id del risotrante</div>
                    
                    <a href="{{ route('admin.plates')}}">vedi i tuoi piatti</a>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
      @if($plate->img && $plate->img != 'https://source.unsplash.com/featured/?food')
      <img src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name}}">
      @else
      <img src="{{ $plate->img }}" class="card-img-top" alt="{{ $plate->name }}">
      @endif

      <div class="card-body">
        <h5 class="card-title"><b>Nome Piatto:</b> {{ $plate->name }} ({{$plate->course->name}})</h5>
        <p class="card-text"><b>Ingredienti:</b> {{ $plate->ingredients }}</p>
        <p class="card-text"><b>Descrizione:</b> {{ $plate->description }}</p>
        <p class="card-text"><b>Prezzo:</b> {{ $plate->price }}€</p>
        <a href="{{ route('admin.plates.edit', $plate->slug) }}" class="btn btn-warning">Modifica il piatto</a>
      </div>
    </div>
    
    
    <a href="{{ route('admin.plates.index') }}" class="btn btn-primary mt-5">Torna ai tuoi piatti</a>
    
</div>
@endsection


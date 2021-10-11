@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card d-flex text-center">
      @if($plate->img && $plate->img != 'https://source.unsplash.com/featured/?food')
      <img class="img-fluid img-show-plate" src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name}}">
      @else
      <img src="{{ $plate->img }}" class="img-fluid img-show-plate" alt="{{ $plate->name }}">
      @endif

      <div class="card-body">
        <h5 class="card-title"><b>Nome Piatto:</b> {{ $plate->name }} </h5>
        <p class="card-text"><b>Portata:</b> {{ $plate->course->name }}</p>
        <p class="card-text"><b>Ingredienti:</b> {{ $plate->ingredients }}</p>
        <p class="card-text"><b>Descrizione:</b> {{ $plate->description }}</p>
        <p class="card-text"><b>Prezzo:</b> {{ $plate->price }}€</p>
        <a href="{{ route('admin.plates.edit', $plate->slug) }}" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
      </div>
    </div>
    
    
    <a href="{{ route('admin.plates.index') }}" class="btn btn-primary mt-5"><i class="fas fa-arrow-alt-circle-left"></i></a>
    
</div>
@endsection


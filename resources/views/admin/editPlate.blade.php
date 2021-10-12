@extends('layouts.app')

@section('content')

<div class="edit-plate">
  <div class="container text-center info-plate">

    <h2>Stai modificando il piatto</h2>

    <form action="{{ route('admin.plates.update', $plate->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label class="form-check-label" for="name">Inserisci il nome del ristorante</label>
          <input type="text" class="form-control text-center  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome piatto" value="{{ $plate->name }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="courses">Seleziona una portata</label>
          <select class="form-control text-center" id="courses" name="course_id">
              @foreach ($courses as $course)
                  <option value="{{$course->id}}" @if($course->id == old('course_id', $plate->course_id)) selected @endif>{{$course->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="ingredients">Scrivi gli ingredienti</label>
          <textarea class="text-center form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="3" placeholder="Ingredienti">{{ $plate->ingredients }}</textarea>
          @error('ingredients')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Descrivi il piatto</label>
            <textarea class="text-center form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Descrizione">{{ $plate->description }}</textarea>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <label for="img">Scegli l'immagine</label>
        <div class="mb-3">
          @if($plate->img)
          <img class="img-show-plate" src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name }}">
          @endif
        </div>
        <div class="mb-3">
          <input type="file" id="img" name="img" style="cursor: pointer; border: 0;" class="text-center form-control-file @error('img') is-invalid @enderror">
          @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" min=0  class="form-control text-center @error('price') is-invalid @enderror" id="price" name="price" placeholder="Prezzo" value="{{ $plate->price }}">
            @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox" id="visible" value="1" name="visible" @if($plate->visible) checked @endif >
            <label class="form-check-label" for="visible">Visibile</label>
            @error('visible')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-pencil-alt"></i></button>

      </form>

  </div>
</div>

@endsection
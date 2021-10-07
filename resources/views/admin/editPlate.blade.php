@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Stai modificando il piatto</h2>

    <form action="{{ route('admin.plates.update', $plate->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome piatto" value="{{ $plate->name }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="courses">Seleziona una portata</label>
          <select class="form-control" id="courses" name="course_id">
              @foreach ($courses as $course)
                  <option value="{{$course->id}}" @if($course->id == old('course_id', $plate->course_id)) selected @endif>{{$course->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="3" placeholder="Ingredienti">{{ $plate->ingredients }}</textarea>
          @error('ingredients')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Descrizione">{{ $plate->description }}</textarea>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-3">
          @if($plate->img)
            <img class="img-thumbnail" src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name }}">
          @endif
        </div>
        <div class="mb-3">
          <input type="file" id="img" name="img" class="form-control-file @error('img') is-invalid @enderror">
          @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <input type="number" step="0.01" min=0 class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Prezzo" value="{{ $plate->price }}">
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

        <button type="submit" class="btn btn-primary mt-3">Modifica piatto</button>

      </form>

</div>
@endsection
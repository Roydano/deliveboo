@extends('layouts.app')

@section('content')
<div class="container-main">
  <div class="container edit-plate text-center edit-plate">

    <h2>Aggiungi un piatto</h2>

    <form action="{{route('admin.plates.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <input type="text" class="form-control text-center @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome piatto" value="{{ old('name') }}">
          @error('name')
            <div class="alert alert-danger">{{ 'Il nome del piatto è obbligatorio' }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="courses">Seleziona una portata</label>
          <select class="form-control text-center"  id="courses" name="course_id">
              @foreach ($courses as $course)
                  <option value="{{$course->id}}" @if($course->id == old('course_id')) selected @endif>{{$course->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <textarea class="form-control text-center @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="3" placeholder="Ingredienti">{{ old('ingredients') }}</textarea>
          @error('ingredients')
            <div class="alert alert-danger">{{ 'Devi inserire gli ingredienti!' }}</div>
          @enderror
        </div>

        <div class="form-group">
            <textarea class="form-control text-center @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Descrizione">{{ old('description') }}</textarea>
            @error('description')
              <div class="alert alert-danger">{{ 'Devi inserire una descrizione del tuo piatto' }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input class="form-control text-center @error('img') is-invalid @enderror" type="file" id="img" name="img">
          @error('img')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <input type="number" step="0.01" min=0 class="text-center form-control  @error('price') is-invalid @enderror" id="price" name="price" placeholder="Prezzo" value="{{ old('price')}}">
            @error('price')
              <div class="alert alert-danger">{{ 'Devi inserire il prezzo' }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="visible" value="1" name="visible" checked>
            <label class="form-check-label" for="visible">Visibile</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Aggiungi piatto</button>

      </form>

  </div>
</div>
@endsection

<style scoped>
 .container-main {
   background-color: black;
   width: 100%;
   min-height: 100vh;
 }
 label {
    font-size: 21px;
  }
</style>
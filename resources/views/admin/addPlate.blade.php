@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Aggiungi un piatto</h2>

    <form action="{{route('admin.plates.store')}}" method="POST" class="">
        @csrf

        <div class="form-group">
          <input type="" class="form-control" id="name" name="name" placeholder="Nome piatto">
        </div>
        
        <div class="form-group">
          <label for="courses">Seleziona una portata</label>
          <select class="form-control" id="courses" name="course_id">
              @foreach ($courses as $course)
                  <option value="{{$course->id}}">{{$course->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <textarea class="form-control" id="ingredients" name="ingredients" rows="3" placeholder="Ingredienti"></textarea>
        </div>

        <div class="form-group">
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrizione"></textarea>
        </div>

        <div class="form-group">
            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prezzo">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="visible" value="1" name="visible" checked>
            <label class="form-check-label" for="visible">Visibile</label>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi piatto</button>

      </form>

</div>
@endsection
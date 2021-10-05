@extends('layouts.app')

@section('content')
<div class="container">
    <h2>pagina dei piatti</h2>
    @foreach($plates as $plate)

    <a href="{{route('admin.plates.show', $plate->slug)}}">
        <div class="mb-5">
            <span>{{$plate->name}}</span>
            <span class="mx-3">{{$plate->price}}€</span>
        </div>
    </a>
    @endforeach

    <div class="btn"><a href="{{route('admin.plates.create')}}">Aggiungi un piatto</a></div>
</div>
@endsection
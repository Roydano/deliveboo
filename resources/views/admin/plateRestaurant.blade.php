@extends('layouts.app')

@section('content')
<div class="container">
    <h2>pagina dei piatti</h2>
    @foreach($plates as $plate)

    <div class="mb-5">
        <h3>{{$plate->name}} id Restaurant {{$plate->restaurant_id}}</h3>
        <span>{{$plate->ingredients}}</span>
        <span class="mx-3">{{$plate->price}}€</span>
    </div>
    @endforeach

    <div class="btn"><a href="{{route('admin.plates.create')}}">Aggiungi un piatto</a></div>
</div>
@endsection
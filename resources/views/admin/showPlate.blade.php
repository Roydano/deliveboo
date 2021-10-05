@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{$plate->name}}</h2>
    <p>Ingredients: {{$plate->ingredients}}</p>
    <div>Price: {{$plate->price}}</div>

    <button class="btn btn-primary mt-5"><a class="text-white" href="{{ route('admin.plates.index') }}">torna ai tuoi piatti</a></button>
</div>
@endsection
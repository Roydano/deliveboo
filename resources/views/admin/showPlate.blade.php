@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{$plate->name}}</h2>
    <p>Ingredients: {{$plate->ingredients}}</p>
    <div>Price: {{$plate->price}}</div>
    <div>Visible: {{$plate->visible}}</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($plates as $plate)

    <div class="mb-5">
        <h3>{{$plate->name}} id Restaurant {{$plate->restaurant_id}}</h3>
        <span>{{$plate->ingredients}}</span>
        <span class="mx-3">{{$plate->price}}€</span>
    </div>

    @endforeach
</div>
@endsection
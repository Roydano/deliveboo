@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($plates as $plate)

    <h3>{{$plate->name}}</h3>
    
    @endforeach
</div>
@endsection
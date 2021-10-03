@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$restaurant->name}}</h3>
    <h6>{{$restaurant->cuisine()->name}} cuisine</h6>
    <span>{{$restaurant->address}} | {{$restaurant->address}}</span>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All restaurants</h3>
    <ul>
        @foreach ($restaurants as $restaurant)
            <li> {{$restaurant->name}} </li>  
        @endforeach
    </ul>
</div>
@endsection

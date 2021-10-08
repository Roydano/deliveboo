@extends('layouts.app')

@section('content')
<div class="container">
    <h2>I Tuoi Piatti</h2>

    <p>
        @if(session('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
        @endif
    </p>

    <p>
        @if(session('autorizzazione'))
        <div class="alert alert-danger">
            {{session('autorizzazione')}}
        </div>
        @endif
    </p>

    <p>
        @if(session('delete'))
        <div class="alert alert-danger">
            {{session('delete')}}
        </div>
        @endif
    </p>

    <p>
        @if(session('create'))
        <div class="alert alert-success">
            {{session('create')}}
        </div>
        @endif
    </p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome Piatto</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Visibile</th>
                <th scope="col">Azione</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plates as $plate)
            <tr>
                <th scope="row">{{ $plate->name }}</th>
                <td>{{ $plate->ingredients }}</td>
                <td>{{ $plate->description }}</td>
                <td>{{ $plate->price }}€</td>
                <td>
                    @if($plate->visible)
                        si
                    @else
                        no
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.plates.show', $plate->slug) }}" type="button" class="btn btn-primary">Vedi Piatto</a>
                    <a href="{{ route('admin.plates.edit', $plate->slug) }}" type="button" class="btn btn-warning">Modifica Piatto</a>
                    <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post" class="d-inline-block del-plate">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Cancella Piatto" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    
    <div class="card bor_none">
        <div class="card-body">
            <a href="{{route('admin.plates.create')}}" class="btn btn-success">Aggiungi un piatto</a>
            <a href="{{route('admin.index')}}" class="btn btn-info">Torna alla tua Dashboard</a>
        </div>
    </div>
</div>
@endsection




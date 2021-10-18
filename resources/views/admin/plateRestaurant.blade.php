@extends('layouts.app')

@section('content')

<div class="plates-restaurant">
    <div class="container plate">
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
                <th scope="col">Image</th>
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
                    @if($plate->img)
                        <img class="img-plate figure-img img-fluid rounded" src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name }}">
                    @endif
                </td>
                <td class="btn-plates">
                    <a href="{{ route('admin.plates.show', $plate->slug) }}" type="button" class="btn bg-psy"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.plates.edit', $plate->slug) }}" type="button" class="btn bg-psy"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post" class="d-inline-block del-plate">
                        @csrf
                        @method('DELETE')
                        <input  type="submit" class="btn bg-psy" value="del"></a>
                    </form>
                    
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    
    <div class="card bor_none" style="background-color: transparent">
        <div class="card-body">
            <a href="{{route('admin.plates.create')}}" class="btn bg-psy mx-5">Aggiungi un piatto</a>
            <a href="{{route('admin.index')}}" class="btn bg-psy mx-5">Torna alla tua Dashboard</a>

        </div>
    </div>
</div>
</div>

@endsection



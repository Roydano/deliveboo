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
                <td>{{ $plate->ingedients }}</td>
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
                    <a href="" type="button" class="btn btn-danger">Cancella Piatto</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    

    <div class="btn"><a href="{{route('admin.plates.create')}}">Aggiungi un piatto</a></div>
</div>
@endsection




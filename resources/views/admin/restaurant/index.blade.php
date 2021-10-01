@extends('layouts.app')

@section('content')

<div class="container">
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codice</th>
                <th scope="col">Nome ristorante</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">P. IVA</th>
                <th scope="col">Numero Telefono</th>
            </tr>
        </thead>
        <tbody>
        @foreach($restaurants as $restaurant)
            <tr>
                <th scope="row">{{ $restaurant->id }} </th>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->address }}</td>
                <td>{{ $restaurant->p_iva }}</td>
                <td>{{ $restaurant->phone }}</td>
                <td>
                    <a href="#" type="button" class="btn btn-primary">Show</a>
                    <a href="#" type="button" class="btn btn-secondary">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>




@endsection
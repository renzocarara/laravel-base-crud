@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Frutivendolo - Home")

@section('content')

<main>

    <section class="container">

        <h1 class="text-center"><strong>Gestione frutta</strong></h1>
        <a class="btn btn-info" href="{{ route('fruits.create') }}">Crea nuovo frutto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">weight</th>
                    <th scope="col">type</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            @forelse ($all_fruits as $fruit)
            <tbody>
                <tr>
                    {{-- <th scope="row">ID</th> --}}
                    <td>{{ $fruit->id }}</td>
                    <td>{{ $fruit->name }}</td>
                    <td>{{ $fruit->weight }}</td>
                    <td>{{ $fruit->type }}</td>
                    <td>
                        <a href="{{ route('fruits.show', ['fruit' => $fruit->id]) }}" class="btn btn-dark">
                            Dettagli
                        </a>
                        <a href="{{ route('fruits.edit', ['fruit' => $fruit->id]) }}" class="btn btn-secondary">
                            Modifica
                        </a>
                        <form id="delete-btn" action="{{ route('fruits.destroy', ['fruit' => $fruit->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Elimina">
                        </form>
                    </td>
                </tr>
            </tbody>
            @empty
            <tr>
                <td>Non c'è frutta!</td>
            </tr>
            @endempty

        </table>

    </section>

</main>

@endsection
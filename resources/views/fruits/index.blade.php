@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Home")

@section('content')

<main>

    <section class="container clearfix">
        <h1 class="d-inline-block mb-5"><strong>Gestione frutta</strong></h1>
        <a class="btn btn-info float-right" href="{{ route('fruits.create') }}">Crea nuovo frutto</a>
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
            {{-- scorro la collection passata in ingresso a questa view --}}
            @forelse ($all_fruits as $fruit)
            <tbody>
                <tr>
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
                        <a href="{{ route('fruits.confirm_destroy', ['fruit' => $fruit->id]) }}" class="btn btn-danger">
                            Elimina
                        </a>
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
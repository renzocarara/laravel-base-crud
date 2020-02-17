@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Conferma cancellazione")

@section('content')

<main>

    <section class="container">

        <h1 class="text-center"><strong>Gestione frutta</strong></h1>
        <h3 class="text-center">Conferma cancellazione frutto</h3>

        <div class="alert alert-danger" role="alert">
            <a href="#" class="alert-link">ATTENZIONE: i dati verranno cancellati definitivamente</a>
        </div>

        <form class="d-inline" action="{{ route('fruits.destroy', ['fruit' => $fruit_to_be_removed]) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Conferma">
        </form>
        <a class="btn btn-info" href="{{ route('fruits.index') }}">
            Annulla
        </a>

        </table>

    </section>

</main>

@endsection
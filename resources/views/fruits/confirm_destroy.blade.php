@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Conferma cancellazione")

@section('content')

<main>

    <section class="container">

        <h1 class="text-center"><strong>Gestione frutta</strong></h1>
        <h3 class="text-center">Conferma cancellazione frutto</h3>

        {{-- avviso per l'utente --}}
        <div class="alert alert-danger" role="alert">
            <a href="#" class="alert-link">ATTENZIONE: i dati verranno cancellati definitivamente</a>
        </div>

        {{-- bottone per confermare ed eseguire la cancellzione --}}
        <form class="d-inline" action="{{ route('fruits.destroy', ['fruit' => $fruit_to_be_removed]) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Conferma">
        </form>

        {{-- bottone per annullare la cancellazione, riporta alla pagina principale --}}
        <a class="btn btn-info" href="{{ route('fruits.index') }}">
            Annulla
        </a>

        </table>

    </section>

</main>

@endsection
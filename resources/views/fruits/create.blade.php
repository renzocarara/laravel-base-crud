@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Inserisci nuovo frutto")

@section('content')

<main>

    <section class="container">

        <h2 class="text-center">Inserimento nuovo frutto</h2>
        <div class="d-flex">
            {{-- al submit chiamo la route 'store' che non corrisponde ad una view da visualizzare, --}}
            {{-- ma è solo del codice che elabora i dati del form e crea un oggetto Fruit da scrivere nel DB --}}
            <form method="post" action="{{ route('fruits.store') }}">

                @csrf

                <div class="form-group">
                    <label for="name-id">Nome:</label>
                    <input type="text" class="form-control" id="name-id" name="name" placeholder="nome del frutto">
                </div>
                <div class="form-group">
                    <label for="weight-id">Peso:</label>
                    <input type="text" class="form-control" id="weight-id" name="weight" placeholder="peso del frutto">
                </div>
                <div class="form-group">
                    <label for="type-id">Varietà:</label>
                    <input type="text" class="form-control" id="type-id" name="type" placeholder="varietà">
                </div>
                <button type="submit" class="btn btn-success">Crea</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>

        </div>

    </section>

</main>

@endsection
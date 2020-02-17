@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Inserisci nuovo frutto")

@section('content')

<main>

    <section class="container">

        <h2 class="d-inline-block mb-5">Dettagli frutto</h2>
        <a class="btn btn-info float-right" href="{{ route('fruits.index') }}">Back</a>
        <div class="d-flex">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ID frutto: {{ $fruit_details->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nome: {{ $fruit_details->name }}</h6>
                    <p class="card-text">Varietà: <strong>{{ $fruit_details->type }}</strong></p>
                    <p class="card-text">Peso: <strong>{{ $fruit_details->weight }} gr.</strong></p>
                    <p class="card-text">inserito: <strong>{{ $fruit_details->created_at }}</strong></p>
                    <p class="card-text">aggiornato: <strong>{{ $fruit_details->updated_at }}</strong></p>
                    {{-- <a href="#" class="card-link"></a> --}}
                    {{-- <a href="#" class="card-link"></a> --}}
                </div>
            </div>

        </div>

    </section>

</main>

@endsection
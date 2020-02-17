@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Inserisci nuovo frutto")

@section('content')

<main>

    <section class="container">

        <h2 class="text-center">Dettagli frutto</h2>
        <div class="d-flex">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $fruit_details->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $fruit_details->type }}</h6>
                    <p class="card-text"> {{ $fruit_details->weight }} gr.</p>
                    {{-- <a href="#" class="card-link"></a> --}}
                    {{-- <a href="#" class="card-link"></a> --}}
                </div>
            </div>

        </div>

    </section>

</main>

@endsection
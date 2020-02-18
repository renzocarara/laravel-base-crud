@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "Fruttivendolo - Modifica frutto")

@section('content')

<main>

    <section class="container">

        <h2 class="d-inline-block mb-5">Modifica frutto</h2>
        <a class="btn btn-info float-right" href="{{ route('fruits.index') }}">Back</a>
        <div class="d-flex">
            {{-- al submit chiamo la route 'update' che non corrisponde ad una view da visualizzare, --}}
            {{-- ma è solo del codice che elabora i dati del form e aggiornerà il DB --}}
            <form method="post" action="{{ route('fruits.update', ['fruit' => $fruit_to_be_edited->id]) }}">
                <!-- questo token è sempre necessario per i form -->
                @csrf
                {{-- Form Method Spoofing --}}
                <!-- questa 'Blade directive' è necessaria per specificargli di trattare i dati di questo
                 form con il metodo 'put' che nei form HTML non è previsto -->
                @method('put')

                <div class="form-group">
                    <label for="name-id">Nome:</label>
                    <input type="text" class="form-control" id="name-id" name="name" value="{{ $fruit_to_be_edited->name }}" placeholder="nome del frutto">
                </div>
                <div class="form-group">
                    <label for="weight-id">Peso:</label>
                    <input type="text" class="form-control" id="weight-id" name="weight" value="{{ $fruit_to_be_edited->weight }}" placeholder="peso del frutto">
                </div>
                <div class="form-group">
                    <label for="type-id">Varietà:</label>
                    <input type="text" class="form-control" id="type-id" name="type" value="{{ $fruit_to_be_edited->type }}" placeholder="varietà">
                </div>
                <button type="submit" class="btn btn-success">Modifica</button>
                <button type="reset" class="btn btn-warning">Reset</button>

            </form>

        </div>

    </section>

</main>

@endsection
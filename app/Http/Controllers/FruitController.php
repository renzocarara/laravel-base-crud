<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// uso la classe Fruit
use App\Fruit;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupero tutti i dati dal DB
        $all_fruits = Fruit::all();
        // ritorno la view 'index' passandogli i dati letti da DB
        return view('fruits.index', ['all_fruits' => $all_fruits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ritorno semplicemente la view 'create'
        return view('fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // questo metodo viene chiamato dal controller quando l'utente preme sull'invio
        // del FORM sulla view 'create', non c'è una view che viene ritornata e che
        // l'utente può vedere, è solo uno script che serve per scrivere nel DB i dati inseriti dall'utente,
        // dopodichè viene fatta una REDIRECT verso la rotta 'fruits/index' (view principale)

        // metto i dati ricevuti tramite il parametro $request in una variabile
        $form_data_received=$request->all();

        // creo un nuovo oggetto di classe Fruit, da scrivere poi nel DB
        $new_fruit = new Fruit();

        // valorizzo il nuovo oggetto con i dati ricevuti
        $new_fruit->fill($form_data_received);

        // alla fine scrivo il nuovo oggetto nel DB
        $new_fruit->save();

        // faccio una REDIRECT vetso la rotta 'index'
        return redirect() -> route('fruits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id) /*  nel caso uso first() o find())*/
    public function show(Fruit $fruit)
    {
        // estraggo il primo record con id = $id
        // uso first() che mi restituisce un singlo oggetto, non una collection,
        // che otterei invece utilizzando la get()
        //$single_fruit=Fruit::where('id', $id) -> first();

        // oppure usando la funzione find() che mi ritorna il singolo oggetto (record)
        // identificato dal parametro $id
        //$single_fruit=Fruit::find($id);

        // ritorno la view 'show' passandogli i dettagli recuperati dal DB
        // return view('fruits.show', ['fruit_details' => $single_fruit]); /*  nel caso uso first() o find())*/

        // ----------- DEPENDENCY INJECTION ------------
        // questo meccanismo mi permette di non dover chiamare la find(),
        // perchè viene IMPLICITAMENTE chiamata da Laravel.
        // Io gli passo un id ma Laravel capisce che in realtà io voglio l'oggetto associato a quell'id.
        // Alla funzione show() metto come parametro in ingresso, non più un semplice id,
        // ma un oggetto di classe Fruit. La funzione show() viene comunque invocata passandogli
        // un 'id' (cioè un numero) ma avendo messo nella sua dichiarazione come parametro in ingresso
        // un oggetto Fruit, Laravel IMPLICITAMENTE chiamerà la find() e andrà a recuperare l'oggetto
        // identificato da quell'id.
        // Poi passo alla view 'show' direttamente il parametro '$fruit' di classe Fruit
        // che ho dichiarato in ingresso alla funzione stessa.
        // ATTENZIONE: il parametro deve avere lo stesso nome del Model (cioè 'fruit'),
        //
        return view('fruits.show', ['fruit_details' => $fruit]);

        // oppure con 'compact'
        // return view('fruits.show', compact('fruit'));
        // oppure con '->with'
        // return view('fruits.show')->with('fruit_details', $fruit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fruit $fruit)
    {
        // come per la show(), uso la DEPENDENCY INJECTION. Chiamo questo metodo
        // passandolgi un id, ma ottengo un oggetto, che Laravel recupera automaticamente,
        // dal DB tramite l'id che gli passo io, e lo mette nel parametro $fruit,
        // che poi io uso per chiamare la view
        return view('fruits.edit',  ['fruit_to_be_edited' => $fruit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fruit $fruit)
    {
        // questo metodo viene chiamato dal controller quando l'utente preme sull'invio
        // del FORM di modifica sulla view 'edit', non c'è una view che viene ritornata e che
        // l'utente può vedere, è solo uno script che serve per aggiornare i dati nel DB
        // con i nuovi dati inseriti dall'utente,
        // dopodichè viene fatta una REDIRECT verso la rotta 'fruits/index' (view principale)

        // NOTA: anche qui come per la show() e la edit(), uso la DEPENDENCY INJECTION,
        // sul secondo parametro in ingresso alla funzione
        // ottengo l'oggetto che cerco, invocando questa funzione passandogli solamente l'id

        // inserisco  in una variabile i dati ricevuti tramite il parametro $request (sono i dati raccolti dal FORM)
        $form_data = $request->all();
        // aggiorno il record  del DB (identificato dall'id che ho passato al momento dell'invocazione)
        $fruit->update($form_data);
        // faccio una redirect verso la pagina principale
        return redirect()->route('fruits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fruit $fruit)
    {
        // a questo metodo non è associata nessuna view,
        // la funzione esegue una cancellazione di un record dal DB e poi fa una REDIRECT
        // verso la pagina principale
        // NOTA: anche qui come per la show(), edit(), update(), uso la DEPENDENCY INJECTION

        $fruit->delete();
        return redirect()->route('fruits.index');
    }

    /**
     * Ask confirmation to remove the specified resource from storage.
     *
     */
    public function confirm_destroy(Fruit $fruit)
    {
        // questa funzione richiama una view che chiede all'utente di confermare la cancellazione
        // NOTA: anche qui come per la uso la DEPENDENCY INJECTION

        return view('fruits.confirm_destroy',  ['fruit_to_be_removed' => $fruit]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // ritorno la view 'index'
        return view('fruits.index', ['all_fruits' => $all_fruits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        // questo metodo viene chiamato dal controller quando l'utente preme sull'invio
        // del FORM sulla view 'create', non c'è una view che viene ritornata e che
        // l'utente può vedere, è solo uno script che serve per scrivere nel DB i dati inseriti dall'utente,
        // dopodicè viene fatta una REDIRECT verso la rotta 'fruits/index' (view principale)

        // metto i dati ricevuti tramite il parametro $request in una variabile
        $form_data_received=$request->all();
        // creo un nuovo oggetto di classe Cloth, da scrivere poi nel DB
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
    public function show($id)
    {
        //
        $single_fruit=Fruit::where('id', $id) -> first();
        return view('fruits.show', ['fruit_details' => $single_fruit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

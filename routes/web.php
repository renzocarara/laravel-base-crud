<?php
use Illuminate\Routing\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// con questa linea, Laravel automaticamente crea tutte le 'routes' necessarie
// per le operazioni CRUD, predisponendo i relativi methodi nel Controller
// (index(), create(), show(), edit(), update(), store(), destroy())
Route::resource('/fruits', 'FruitController'); // 'slug' , controller

// creo una nuova route che serve per visualizzare una view di 'richiesta conferma' in caso di cancellazione
Route::get('/fruits/{fruit}/confirm_destroy', 'FruitController@confirm_destroy')->name('fruits.confirm_destroy'); // 'slug' , controller@method

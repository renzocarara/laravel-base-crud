<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    //
    // indico quali sono i campi 'fillabili', in automatico, tramite il metodo fill()
    // cioè quando utilizzo il metodo fill(), Laravel automaticamente mi copia nel mio
    // oggetto (che è poi un record) che va scritto nel DB, i campi della tabella
    // che specifico qui sotto
    protected $fillable=['name','weight','type'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function itens(){
        return $this->belongsToMany(Iten::class, 'itens_events', 'event_id', 'item_id');
        //passei os Ids pois se não ele passa automaticamente 
    }

    public function User(){
        return $this->belongsTo('App\Models\User'); //pertence a um useuario
    }

    protected $dates = ['date']; //adicionando o campo data
}

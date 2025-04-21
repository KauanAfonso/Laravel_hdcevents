<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function itens(){
        return $this->belongsToMany(Iten::class, 'itens_events', 'event_id', 'item_id');
        //passei os Ids pois se não ele passa automaticamente, e iria conflitar
    }



    protected $guarded = []; //deixa atualizar tudo

    public function User(){
        return $this->belongsTo('App\Models\User'); //pertence a um useuario
    }


    public function Users(){
        return $this->belongsToMany(User::class, 'event_user'); //relacionamento n:n
    }

    protected $dates = ['date']; //adicionando o campo data
}

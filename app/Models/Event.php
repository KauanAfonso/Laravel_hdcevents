<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function itens(){
        return $this->belongsToMany(Iten::class, 'itens_events');
    }

    public function User(){
        return $this->belongsTo('App\Models\User'); //pertence a um useuario
    }

    protected $dates = ['date']; //adicionando o campo data
}

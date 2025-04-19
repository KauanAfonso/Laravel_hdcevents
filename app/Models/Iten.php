<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model;



class Iten extends Model{

    public function events(){
        return $this->belongsToMany(Event::class, 'itens_events');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function itens(){
        return $this->belongsToMany(Iten::class, 'itens_events');
    }

}

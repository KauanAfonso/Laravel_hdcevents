<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
//rota principal
    public function Index(){

        //obtendo todos os eventos por nossa model
        $events = Event::all();
        return view('welcome',["events" => $events]); //Enviando para ser renderizado
    }
    //metodo para visualizar o /create
    public function create(){
        return view('events.create');
    }
}

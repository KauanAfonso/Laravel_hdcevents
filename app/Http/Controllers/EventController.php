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

    public function store(Request $request){

        $event = new Event(); //instanciando um nova objetp

        //criando os objetos
        $event->title = $request->title;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->city = $request->city;

        $event->save();//salvando no bacno

        return redirect('/')->with('msg', "Evento criado com sucesso"); //redirecionando
    }

    public function single_event(int $id){
        $event = Event::find($id);
        return view('events.event', ['event' => $event]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Iten;
use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
//rota principal
    public function Index(){

        //obtendo todos os eventos por nossa model
        $events = Event::all();

        return view('welcome', ['events'=>$events]); //Enviando para ser renderizado
    }
    //metodo para visualizar o /create
    public function create(){
        $availible_itens = Iten::all(); //pegando todos os itens
        return view('events.create', ['itens' => $availible_itens]);
    }

    public function store(Request $request){

        $event = new Event(); //instanciando um nova objeto

        //criando os objetos
        $event->title = $request->title;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->city = $request->city;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requesImage = $request->image; //pega a imagem do input
            $extension = $requesImage->extension(); // pega a extenção do arquivo

            $imageName = md5($requesImage->getClientOriginalName() . strtotime("now")) . "." . $extension; //criptografa

            $requesImage->move(public_path('img/events'), $imageName); //Move a imagem para a pasta public/img/events do seu projeto, usando o nome gerado.

            $event->image = $imageName;
        }else {
            return back()->withErrors(['image' => 'Erro ao fazer upload da imagem.']);
        }

        $event->save();//salvando no bacno

        if($request->has('itens')){//verifica se o form enviou o campo itens
            $event->itens()->attach($request->itens); //pega os itens e insere na tabela intemediaria
        }

        return redirect('/')->with('msg', "Evento criado com sucesso"); //redirecionando
    }

    public function single_event(int $id){
        $event = Event::find($id);
        return view('events.event', ['event' => $event]);

    }
}

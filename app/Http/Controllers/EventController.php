<?php

namespace App\Http\Controllers;

use App\Models\Iten;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
//rota principal
    public function Index(){

        //obtendo todos os eventos por nossa model

        $search = request('search');

        if($search){
            #procuradno no banco no campo title que seja parecido e contenha o search
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $events = Event::all();
        }


        return view('welcome', ['events'=>$events, 'search'=> $search]); //Enviando para ser renderizado
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
        $event->date = $request->date;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requesImage = $request->image; //pega a imagem do input
            $extension = $requesImage->extension(); // pega a extenção do arquivo

            $imageName = md5($requesImage->getClientOriginalName() . strtotime("now")) . "." . $extension; //criptografa

            $requesImage->move(public_path('img/events'), $imageName); //Move a imagem para a pasta public/img/events do seu projeto, usando o nome gerado.

            $event->image = $imageName;
        }else {
            return back()->withErrors(['image' => 'Erro ao fazer upload da imagem.']);
        }

        //relacionando evento com usuario que criou
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();//salvando no bacno

        if($request->has('itens')){//verifica se o form enviou o campo itens
            $event->itens()->attach($request->itens); //pega os itens e insere na tabela intemediaria
        }

        return redirect('/')->with('msg', "Evento criado com sucesso"); //redirecionando
    }

    public function single_event(int $id){
        $event = Event::findOrFail($id);

        $eventOner = User::where('id', $event->user_id)->first(); //obtendo o usuario dono, o primeiro
        return view('events.event', ['event' => $event, "eventOwner" => $eventOner]);

    }

    public function dashboard(){

        $user = auth()->user();
        $events = $user->events; //funçao que relaciona eventos com user na model

        return view('events.dashboard', ['events' => $events]);

    }

    public function destroy(int $id){

        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', "Evento excluido com sucesso !");
    }


    public function edit(int $id){

        Event::findOrFail($id);
        return view('events.edit')->with('event'=>$event);


    }
}

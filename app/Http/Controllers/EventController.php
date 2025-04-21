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

        $eventAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventAsParticipant]); //retornando os eventos do usuairo como participante

    }

    public function destroy(int $id){

        Event::findOrFail($id)->delete(); //excluindo o evento
        return redirect('/dashboard')->with('msg', "Evento excluido com sucesso !"); //retornando a mensagem
    }



    public function edit(int $id){//função de renderizar sobre o form de edit eventos

        $user = auth()->user();
        $event = Event::findOrFail($id);

        //somente o dono do evento pode editar o evento
        if($user->id !== $event->user_id){
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event])->with("msg" , "Criado com sucesso");


    }


    public function update(Request $request)
    {
        // Busca o evento pelo ID
        $event = Event::findOrFail($request->id);

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $uploadedImage = $request->file('image');
            $extension = $uploadedImage->extension(); //obetendo a extensão

            // Gera um nome único para a imagem
            $imageName = md5($uploadedImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // Move a imagem para a pasta public/img/events
            $uploadedImage->move(public_path('img/events'), $imageName);

            // Atribui o novo nome ao evento
            $event->image = $imageName;
        }

        // Atualiza os campos do evento (exceto 'itens' e 'image' para evitar sobrescrita)
        $event->fill($request->except(['itens', 'image']));
        $event->save(); // Salva o evento com ou sem imagem

        // Atualiza os itens do relacionamento
        $event->itens()->sync($request->itens ?? []);

        return redirect('/dashboard')->with('msg', "Evento atualizado com sucesso!");
    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', "Sua presença está confirmada no evento" . $event->title);


    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Event extends Controller
{
//rota principal
    public function Index(){

        $nome = "Kauan";
        $idade = 18;

        $arr = [10,8,1,6,5,];
        $profissoes = ['Programador', "Desenvolvedor", "Medico"];

        return view('welcome',["nome" => $nome, "idade"=> $idade, "arr"=>$arr, "profissoes"=> $profissoes]); //Enviando para ser renderizado
    }
    //metodo para visualizar o /create
    public function create(){
        return view('events.create');
    }
}

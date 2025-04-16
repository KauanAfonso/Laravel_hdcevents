<?php

use Illuminate\Support\Facades\Route;

//Rota para index
Route::get('/', function () {
    $nome = "Kauan";
    $idade = 18;

    $arr = [10,8,1,6,5,];
    $profissoes = ['Programador', "Desenvolvedor", "Medico"];

    return view('welcome',["nome" => $nome, "idade"=> $idade, "arr"=>$arr, "profissoes"=> $profissoes]); //Enviando para ser renderizado
});



//Rota para contato
Route::get('/contact', function () {
    return view('contact'); //semelhante ao render
});


//Rota para produtos
Route::get('/produtos', function () {
    return view('products');
});

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


//Rota para produtos -> passano queryString
Route::get('/produtos', function () {

    //Pegando a busca o usuario na url
    $busca = request('search');
    return view('products' , ['busca' => $busca]);
});


//path parameters e query paramters
//o {id} com ? indica que ele passou a ser opcional
Route::get('produtos_teste/{id?}', function(Int $id = null){
    return view('product', ['id' => $id]);
});

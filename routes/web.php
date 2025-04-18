<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Event;

//Rota para index utilizando o controller
Route::get('/', [Event::class, 'index']);
Route::get('/events/create', [Event::class, 'create']);


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

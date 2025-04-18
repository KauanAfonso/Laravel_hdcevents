<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdutosController;

//Rota para renderizar o index do evento
Route::get('/', [EventController::class, 'index']);

//rota para renderizar o form de criar eventos, -> chama o controler dele
Route::get('/events/create', [EventController::class, 'create']);

//rota para envar os dados do form criar evento -> chama o controler dele
Route::post('/events', [EventController::class, 'store']);

Route::get('/events/{id}', [EventController::class, 'single_event']);

//Rota para contato
Route::get('/contact', function () {
    return view('contact'); //semelhante ao render
});





















//Rota para produtos -> passano queryString
Route::get('/produtos', [ProdutosController::class, 'index']);


//path parameters e query paramters
//o {id} com ? indica que ele passou a ser opcional
Route::get('produtos_teste/{id?}', function(Int $id = null){
    return view('product', ['id' => $id]);
});

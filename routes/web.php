<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdutosController;

//Rota para renderizar o index do evento
Route::get('/', [EventController::class, 'index']);

//rota para renderizar o form de criar eventos, -> chama o controler dele
Route::get('/events/create', [EventController::class, 'create'])->Middleware('auth');//Só useers logados podem ter acesso

//rota para envar os dados do form criar evento -> chama o controler dele
Route::post('/events', [EventController::class, 'store']);

Route::get('/events/{id}', [EventController::class, 'single_event']);

//Rota para contato
Route::get('/contact', function () {
    return view('contact'); //semelhante ao render
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/{id}', [EventController::class,'destroy']);
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});

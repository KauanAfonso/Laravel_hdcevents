<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    //
    Public function index(){
    //Pegando a busca o usuario na url
        $busca = request('search');
        return view('products' , ['busca' => $busca]);
    }
}

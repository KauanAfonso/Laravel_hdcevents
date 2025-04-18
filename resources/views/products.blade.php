@extends('layouts.main')

@section('title', 'produtos')

@section('content')


<h2>Tela de produtos</h2>


{{-- verificando se o queryParamter n está vazio --}}
@if ($busca !== ' ')

<p>O usuario está buscando por {{ $busca }}</p> {{-- -Aparecer o que o usuário pesquisou --}}

@endif


@endsection

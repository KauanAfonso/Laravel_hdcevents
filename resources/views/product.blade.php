@extends('layouts.main')

@section('title', 'Produto')


@section('content')

{{-- verificando se o id é nulo --}}
@if ($id  == null)
    <p>Número invalido</p>

@else
    <p>Exibindo produto id: {{ $id }}</p>

@endif



@endsection



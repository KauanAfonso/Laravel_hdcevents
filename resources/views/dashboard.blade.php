@extends('layouts.main')

@section('title', 'produtos')

@section('content')


<h2>Meus Eventos</h2>

<div>
    @if(count(events) > 0)
    @else
        <p>Você ainda não tem eventos, <a href="/events/create">Criar Evento</a></p>
    @endif
</div>


@endsection

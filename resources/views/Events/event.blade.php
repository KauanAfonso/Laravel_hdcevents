@extends('layouts.main')

@section('title', "Visualizar Evento")


@section('content')




<p>Title : {{ $event->title }}</p>
<p>Description: {{ $event->description }}</p>
<img src="/img/events/{{ $event->image }}" alt="">


@endsection



@extends('layouts.main'){{--extendendo o layout de main--}}

@section('title', 'KC Events')

@section('content')

   @foreach ($events as $event )

        <p>{{ $event->title }} -- {{ $event->description }}</p>

   @endforeach

@endsection {{--Fechando a section--}}

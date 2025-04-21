
@extends('layouts.main')

@section('title', "Visualizar Evento")

@section('content')


<div class="max-w-4xl mx-auto mt-10 p-8 bg-white rounded-lg shadow">
    <div class="flex flex-col md:flex-row gap-8 items-start">

        <!-- Imagem à esquerda -->
        <div class="w-full md:w-1/2 p-6">
            <img src="/img/events/{{ $event->image }}" alt="Imagem do evento {{ $event->title }}" class="w-full h-72 object-cover rounded-md shadow-md">
        </div>

        <!-- Informações à direita -->
        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>

            <div class="space-y-3 text-gray-700">
                <p><span class="font-semibold">Dono do Evento:</span> {{ $eventOwner->name }}</p>
                <p><span class="font-semibold">Local:</span> {{ $event->city }}</p>
                <p><span class="font-semibold">Descrição:</span> {{ $event->description }}</p>
                <p><span class="font-semibold">Participantes:</span> {{ count($event->users) }}</p> {{-- contando o numero de participantes --}}
                <h3>Itens disponíveis:</h3>
                <ul>
                    @foreach ($event->itens as $itens )

                    <li>{{ $itens->name }}</li>

                    @endforeach
                </ul>
            </div>

            <!-- Botão de Confirmar Presença -->
            <form action="/events/join/{{ $event->id }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" id="event-submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition">
                    Confirmar presença
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

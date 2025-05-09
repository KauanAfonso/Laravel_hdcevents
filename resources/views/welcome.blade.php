@extends('layouts.main') {{-- Estende o layout principal da aplicação --}}

@section('title', 'KC Events') {{-- Define o título da página --}}

@section('content') {{-- Início da seção de conteúdo da página --}}

    {{-- Container da barra de pesquisa --}}
    <div id="search-container" class="flex justify-center">
        <form action='/' method="GET" class="max-w-xl w-full flex items-center gap-2 mt-4">
            {{-- Campo de pesquisa --}}
            <input
                type="text"
                id="search"
                name="search"
                class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 p-2.5

                      "
                placeholder="Palestra de TI"
            >

            {{-- Botão de pesquisa --}}
            <button
                type="submit"
                class="inline-flex p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900
                       rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400
                       group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white
                       focus:ring-4 focus:outline-none focus:ring-pink-200
                      "
            >
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75
                             bg-white rounded-md
                             group-hover:bg-transparent group-hover:dark:bg-transparent">
                    Pesquisar
                </span>
            </button>
        </form>
    </div>

    {{-- Título e subtítulo da seção de eventos --}}
    <div class="w-full max-w-3xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-left mt-10">Eventos disponíveis</h3>
        @if ($search)
            <h1>Buscando por {{ $search }}</h1>
        @endif
    </div>

    {{-- Grade de cards dos eventos --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 p-6">
        @foreach ($events as $event)
            {{-- Card de evento --}}
            <div class="max-w-sm h-50 w-110 p-6 rounded-lg bg-white border border-gray-200 shadow-sm">

                {{-- Imagem do evento --}}
                <a href="#">
                <figure class="max-w-lg">
                    <img class="h-auto max-w-full rounded-lg " src="/img/events/{{ $event->image }}" alt="image description">
                    <figcaption class="mt-2 text-sm text-center text-gray-500">Image caption</figcaption>
                </figure>
                </a>

                {{-- Conteúdo do card --}}
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $event->title }}
                        </h5>
                    </a>

                    <h6 class="mb-3 font-normal text-gray-700">
                        {{ $event->description }}.
                    </h6>

                    <p class="mb-3 font-normal text-gray-700">
                        Data do evento: {{ date('d/m/y', strtotime($event->date)) }}
                    </p>

                    <p class="mb-3 font-normal text-gray-700">
                        Participantes: {{ count($event->users) }}
                    </p>

                    {{-- Botão de inscrição --}}
                    <a href="/events/{{ $event->id }}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-white
                              bg-red-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none
                              focus:ring-blue-300
                             "
                    >
                        Se inscrever
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        {{-- msg caso não tenho eventos --}}
        @if(count($events) == 0 && $search   )
            <p>Não encnntrado esse evento : {{ $search }}. veja todos os eventos disponiveis <a href="/">aqui</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponívies</p>
        @endif
    </div>

@endsection {{-- Fim da seção de conteúdo --}}

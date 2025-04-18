@extends('layouts.main') {{-- Estende o layout principal da aplicação --}}

@section('title', 'KC Events') {{-- Define o título da página --}}

@section('content') {{-- Início da seção de conteúdo da página --}}

    {{-- Container da barra de pesquisa --}}
    <div id="search-container" class="flex justify-center">
        <form class="max-w-xl w-full flex items-center gap-2 mt-4">
            {{-- Campo de pesquisa --}}
            <input
                type="text"
                id="search"
                name="search"
                class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 p-2.5
                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                       dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Palestra de TI"
            >

            {{-- Botão de pesquisa --}}
            <button
                type="submit"
                class="inline-flex p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900
                       rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400
                       group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white
                       dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200
                       dark:focus:ring-pink-800"
            >
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75
                             bg-white dark:bg-gray-900 rounded-md
                             group-hover:bg-transparent group-hover:dark:bg-transparent">
                    Pesquisar
                </span>
            </button>
        </form>
    </div>

    {{-- Título e subtítulo da seção de eventos --}}
    <div class="w-full max-w-3xl mx-auto px-6">
        <h3 class="text-3xl font-bold dark:text-white text-left mt-10">Eventos disponíveis</h3>
        <p class="mb-6 text-gray-500 dark:text-gray-400 text-left">Veja os próximos eventos.</p>
    </div>

    {{-- Grade de cards dos eventos --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 p-6">
        @foreach ($events as $event)
            {{-- Card de evento --}}
            <div class="max-w-sm h-auto w-full rounded-lg bg-white border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">

                {{-- Imagem do evento --}}
                <a href="#">
                    <img class="rounded-t-lg" src="https://catalogo.webmotors.com.br/imagens/prod/fotos-temas/CardDesktop/cdb35e13-66a2-4653-8414-f41f408e34da_CardDesktop.webp?s=fill&w=274&h=216&q=70" alt="Imagem do evento" />
                </a>

                {{-- Conteúdo do card --}}
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $event->title }}
                        </h5>
                    </a>

                    <h6 class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $event->description }}.
                    </h6>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Data: 20/09/2022.
                    </p>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Participantes.
                    </p>

                    {{-- Botão de inscrição --}}
                    <a href="#"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-white
                              bg-red-500 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none
                              focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700
                              dark:focus:ring-blue-800"
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
    </div>

@endsection {{-- Fim da seção de conteúdo --}}

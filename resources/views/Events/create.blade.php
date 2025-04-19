@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center p-19">Crie um evento</h1>

<div class="flex flex-col lg:flex-row justify-center gap-10">

    {{-- Lado esquerdo: Formulário --}}
    <form class="w-full lg:w-1/2" action="/events" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Imagem --}}
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagem do evento</label>
            <input type="file" id="image" name="image" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        {{-- Título --}}
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
            <input type="text" id="title" name="title" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        {{-- Descrição --}}
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
            <textarea id="description" name="description" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
        </div>

        {{-- Cidade --}}
        <div class="mb-5">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
            <input type="text" id="city" name="city" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        {{-- Privado --}}
        <div class="mb-5">
            <label for="private" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">É privado?</label>
            <select id="private" name="private" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>

        {{-- Itens --}}
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Itens disponíveis:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach ($itens as $item)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="itens[]" value="{{ $item->id }}" {{--Enviando uma lista de intes com o valor do id--}}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" />
                        <span class="text-gray-900 dark:text-white">{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Botão de envio --}}
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Criar evento
        </button>
    </form>

</div>

@endsection

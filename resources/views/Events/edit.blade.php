@extends('layouts.main')

@section('title', 'Editando: ' .$event->title)

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 sm:px-6 lg:px-8 p-6">
    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-2xl p-8">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-10">Criar novo evento</h1>
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 m-4">
                {{-- Coluna esquerda: dados principais --}}
                <div class="space-y-6">
                    {{-- Imagem --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Imagem do evento</label>
                        <input type="file" id="image" name="image" required
                            class="mt-2 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                    </div>

                    {{-- Título --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" id="title" name="title" required
                            class="mt-2 w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Descrição --}}
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea id="description" name="description" rows="4" required
                            class="mt-2 w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>


                    {{-- data --}}
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Data do evento: </label>
                        <input type="date" id="date" name="date" required
                            class="mt-2 w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Cidade --}}
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                        <input type="text" id="city" name="city" required
                            class="mt-2 w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Privado --}}
                    <div>
                        <label for="private" class="block text-sm font-medium text-gray-700">Evento privado?</label>
                        <select id="private" name="private" required
                            class="mt-2 w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Selecione uma opção</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                {{-- Coluna direita: itens e botão --}}
                <div class="flex flex-col justify-between space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Itens disponíveis:</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach ($itens as $item)
                                <label class="flex items-center space-x-2 text-sm text-gray-900">
                                    <input type="checkbox" name="itens[]" value="{{ $item->id }}"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span>{{ $item->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full rounded-lg bg-gray-700 hover:bg-gray-900 text-white font-medium py-3 text-center transition duration-200 focus:ring-4 focus:ring-blue-300">
                            Criar Evento
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

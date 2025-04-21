@extends('layouts.main')

@section('title', 'Produtos')

@section('content')

<!-- Container principal centralizado com espaçamento -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

    <!-- Título da página -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Meus Eventos</h2>

    @if(count($events) > 0)
        <!-- Tabela responsiva com sombra e bordas arredondadas -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <!-- Cabeçalho da tabela -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3">Participantes</th>
                        <th class="px-6 py-3">Ações</th>
                    </tr>
                </thead>

                <!-- Corpo da tabela com os eventos -->
                <tbody>
                    @foreach ($events as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <!-- Número do evento na lista -->
                            <td class="px-6 py-4">{{ $loop->index + 1 }}</td>

                            <!-- Título do evento com link para a página de detalhes -->
                            <td class="px-6 py-4">
                                <a href="/events/{{ $event->id }}" class="text-blue-600 hover:underline">
                                    {{ $event->title }}
                                </a>
                            </td>

                            <!-- Número de participantes (fixo como 0 por enquanto) -->
                            <td class="px-6 py-4">0</td>

                            <!-- Ação de deletar evento com proteção CSRF -->
                            <td class="px-6 py-4">
                                <form action="/events/{{ $event->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- Mensagem caso o usuário ainda não tenha eventos -->
        <p class="text-gray-600 mt-4">
            Você ainda não tem eventos.
            <a href="/events/create" class="text-blue-600 hover:underline">Criar Evento</a>
        </p>
    @endif

</div>

@endsection

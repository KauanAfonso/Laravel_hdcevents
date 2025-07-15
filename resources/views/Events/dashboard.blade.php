@extends('layouts.main')

@section('title', 'Dashboard de Eventos')

@section('content')

<!-- Container principal com espaçamento e largura máxima -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 space-y-12 ">

    <!-- Seção: Eventos criados pelo usuário -->
    <section>
        <h2 class="text-3xl font-bold text-red-800 mb-6">Meus Eventos Criados</h2>

        @if(count($events) > 0)
            <!-- Tabela estilizada com Tailwind, responsiva e bonita -->
            <div class="relative overflow-x-auto shadow-lg rounded-xl">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-white uppercase bg-red-800">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nome</th>
                            <th class="px-6 py-3">Participantes</th>
                            <th class="px-6 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <!-- Loop pelos eventos criados pelo usuário -->
                        @foreach ($events as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <!-- Número da linha -->
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>

                                <!-- Nome do evento com link para detalhes -->
                                <td class="px-6 py-4">
                                    <a href="/events/{{ $event->id }}" class="text-blue-600 hover:underline font-semibold">
                                        {{ $event->title }}
                                    </a>
                                </td>

                                <!-- Contador de participantes -->
                                <td class="px-6 py-4">{{ count($event->users) }}</td>

                                <!-- Ações: deletar e atualizar -->
                                <td class="px-6 py-4 space-x-4">
                                    <!-- Formulário de deletar com confirmação -->
                                    <form action="/events/{{ $event->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este evento?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:underline">Deletar</button>
                                    </form>

                                    <!-- Link para atualizar o evento -->
                                    <a href="/events/edit/{{ $event->id }}" class="text-green-600 hover:underline">Atualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <!-- Mensagem se o usuário ainda não criou eventos -->
            <p class="text-gray-600 mt-8">
                Você ainda não criou nenhum evento.
                <a href="/events/create" class="text-indigo-800 hover:underline font-medium">Criar Evento</a>
            </p>
        @endif
    </section>

    <!-- Seção: Eventos que o usuário está participando -->
    <section>
        <h2 class="text-3xl mt-10 font-bold text-red-800 mb-6">Eventos que Estou Participando</h2>

        @if(count($eventsasparticipant) > 0)
            <!-- Grade de cartões com os eventos que o usuário participa -->
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($eventsasparticipant as $event)
                    <!-- Cartão de evento participante -->
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <a href="events/{{ $event->id }}"><h3 class="text-xl font-semibold text-indigo-700">{{ $event->title }}</h3></a>
                        <p class="text-gray-600 mt-2">{{ $event->description }}</p>

                        <!-- Formatação de data com Carbon -->
                        <p class="text-sm text-gray-500 mt-1">📆 {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>

                        <!-- Link fictício para remover presença (você pode colocar a rota depois) -->
                        <div class="mt-4">
                            <form action="events/leave/{{ $event->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-900">Sair do evento</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Mensagem caso não esteja participando de nenhum evento -->
            <p class="text-gray-600">Você ainda não está participando de nenhum evento.</p>
        @endif
    </section>

</div>

@endsection

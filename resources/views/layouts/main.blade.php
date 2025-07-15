<!DOCTYPE html>
<html lang="en"> <!-- Define o idioma do documento como inglês -->
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade para dispositivos móveis -->
    <title>@yield('title')</title> <!-- Título dinâmico com Blade -->

    <!-- Pré-conexão com servidor de fontes para performance -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Importação de fontes do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cinzel:wght@400..900&family=Jersey+25&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Importação do Flowbite para componentes UI com Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Importação do CSS customizado do projeto -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<header>
<!-- Navegação principal com estilo de "breadcrumb" -->
<nav class="justify-between px-4 py-5 text-white border border-gray-200 rounded-lg sm:flex sm:px-5 bg-red-800" aria-label="Breadcrumb">

  <!-- Links de navegação -->
  <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
    <li>
      <div class="flex items-center">
        <!-- Link para eventos -->
        <a href="/" class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2">Eventos</a>

        {{-- Aparecerá se o user estuver logado --}}
        @auth

            <a href="/dashboard" class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2">Meus Eventos</a>

            <form action="/logout" method="POST">
            @csrf
                <a href="/logout"
                class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2"
                onclick="event.preventDefault(); this.closest('form').submit();">
                    Sair
                </a>
            </form>


        @endauth


        {{-- Só aparecere para usuario não logado --}}
        @guest
        <!-- Link para produtos -->
        <a href="/login" class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2">Entrar</a>

        <!-- Link para filtro de produtos -->
        <a href="/register" class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2">Cadastrar</a>
        @endguest
    </div>
    </li>

    <!-- Breadcrumb indicando página atual: Criar -->
    <li aria-current="page">
      <div class="flex items-center">
        <!-- Ícone separador -->
        <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>

        <!-- Link para criação de evento -->
        <a href="/events/create" class="ms-1 text-sm font-medium text-white hover:text-gray-200 md:ms-2">Criar</a>
      </div>
    </li>
  </ol>

</nav>
</header>

<!-- Onde o conteúdo específico da página será injetado -->
<main>

<div >
    @if (session('msg'))
        <p class="msg w-[500px] mx-auto bg-green-500 text-white p-4 text-center">{{ session('msg') }}</p> {{--Se tiver mensagem aparecerá aqui--}}
    @endif
    @if (session('errorMsg'))
        <p class="msg w-[500px] mx-auto bg-gray-800 text-white p-4 text-center">{{ session('errorMsg') }}</p> {{--Se tiver mensagem aparecerá aqui--}}
    @endif
    @yield('content'){{-- Local onde será injetado o conteudo das outras views --}}
</div>

</main>

<!-- Rodapé -->
<footer class="bg-red-800 rounded-lg shadow-sm mb-6">
  <div class="w-full max-w-screen-xl mx-auto md:py-8">

    <!-- Logo + Links -->
    <div class="sm:flex sm:items-center sm:justify-between">
      <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl text-white font-semibold whitespace-nowrap">Kc Events</span>
      </a>

      <!-- Links de navegação no rodapé -->
      <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0">
        <li><a href="#" class="hover:underline me-4 md:me-6">About</a></li>
        <li><a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a></li>
        <li><a href="#" class="hover:underline me-4 md:me-6">Licensing</a></li>
        <li><a href="#" class="hover:underline">Contact</a></li>
      </ul>
    </div>

    <!-- Linha divisória -->
    <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />

    <!-- Copyright -->
    <span class="block text-sm text-white sm:text-center">KC Events &copy; 2025. All Rights Reserved.</span>
  </div>
</footer>

<!-- Script do Flowbite para componentes funcionais como dropdowns -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>

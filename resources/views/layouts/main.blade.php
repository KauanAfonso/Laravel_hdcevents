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
<nav class="justify-between px-4 py-3 text-white border border-gray-200 rounded-lg sm:flex sm:px-5 bg-red-800 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">

  <!-- Links de navegação -->
  <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
    <li>
      <div class="flex items-center">
        <!-- Link para eventos -->
        <a href="/" class="ms-1 text-sm font-medium text-white hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Eventos</a>

        <!-- Link para produtos -->
        <a href="/produtos" class="ms-1 text-sm font-medium text-white hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Produtos</a>

        <!-- Link para filtro de produtos -->
        <a href="/" class="ms-1 text-sm font-medium text-white hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Filtro Produtos</a>
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
        <a href="/events/create" class="ms-1 text-sm font-medium text-white hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Criar</a>
      </div>
    </li>
  </ol>

  <!-- Botão de dropdown lateral (menu flutuante) -->
  <div>
    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:focus:ring-gray-700">
      <!-- Ícone -->
      <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
      </svg>
      Fix #6597
      <!-- Ícone seta -->
      <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg>
    </button>

    <!-- Conteúdo do dropdown -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
      <ul class="py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownDefault">
        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New branch</a></li>
        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rename</a></li>
        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<!-- Onde o conteúdo específico da página será injetado -->
<main>

<div >
    @if (session('msg'))
        <p class="msg w-[500px] mx-auto bg-green-700 text-white p-4 text-center">{{ session('msg') }}</p> {{--Se tiver mensagem aparecerá aqui--}}
    @endif
    @yield('content'){{-- Local onde será injetado o conteudo das outras views --}}
</div>

</main>

<!-- Rodapé -->
<footer class="bg-red-800 rounded-lg shadow-sm dark:bg-gray-900 mb-6">
  <div class="w-full max-w-screen-xl mx-auto md:py-8">

    <!-- Logo + Links -->
    <div class="sm:flex sm:items-center sm:justify-between">
      <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
      </a>

      <!-- Links de navegação no rodapé -->
      <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0 dark:text-white">
        <li><a href="#" class="hover:underline me-4 md:me-6">About</a></li>
        <li><a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a></li>
        <li><a href="#" class="hover:underline me-4 md:me-6">Licensing</a></li>
        <li><a href="#" class="hover:underline">Contact</a></li>
      </ul>
    </div>

    <!-- Linha divisória -->
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

    <!-- Copyright -->
    <span class="block text-sm text-white sm:text-center dark:text-gry-400">KC Events &copy; 2025. All Rights Reserved.</span>
  </div>
</footer>

<!-- Script do Flowbite para componentes funcionais como dropdowns -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>

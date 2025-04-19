@extends('layouts.main')


@section('title', 'Criar Evento')

@section('content')


<h1>Crie um evento</h1>

<form class="max-w-sm mx-auto" action="/events" method="POST" enctype="multipart/form-data">{{-- enctype é nescessario para enviar aquivos --}}
    @csrf

    <div class="mb-5">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your image</label>
    <input type="file" id="image" name="image" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="name@flowbite.com" required />
  </div>

  <div class="mb-5">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your title</label>
    <input type="title" id="title" name="title" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="name@flowbite.com" required />
  </div>
  <div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your description</label>
    <textarea id="description" name="description" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required>Description</textarea>
  </div>

  <div class="mb-5">
    <label foprivate class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your city</label>
    <input type="city" id="city" name="city" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
  </div>

  <div class="mb-5">
  <label for="private" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">É privado?</label>
  <select id="private" name="private" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="" disabled selected>Selecione uma opção</option>
    <option value="1">Sim</option>
    <option value="0">Não</option>
  </select>
</div>

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create event </button>
</form>



@endsection





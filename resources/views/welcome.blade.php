<body>

    <h2>Seja bem vindo</h2>
    {{-- Renderizando se a condição for verdadeira --}}
    @if( 10> 5)
        <p>A condição é true</p>
    @endif

    {{---Obtendo dados da route--}}
    <p>O nome é: {{ $nome }} e ele tem {{ $idade }} anos</p>

    @if($nome == "Pedro")
        <p>O nome é igual a Pedro</p>
    @elseif($nome == "Cris")
        <p>O nome é igual a Cris</p>
    @else
    <p>Não não é igual a nenhum</p>
    @endif



    <h2>Profissões</h2>

    {{--Uso do forEch--}}

    @foreach ($profissoes as $prof )
        <!-- <p>{{ $loop->index }}</p> --> {{-- Pega o index --}}
        <p>{{ $prof }}</p>
    @endforeach

    {{--Uso do for normal --}}
    @for ($i = 0; $i < count($arr); $i++)

        <p>Numero {{ $arr[$i] }} indicie: {{ $i }}</p>

    @endfor


    {{-- È possivel rodar PHP puro aqui --}}
    @php

    $frase = "Hoje é um lindo dia";
    echo $frase;

    @endphp
</body>

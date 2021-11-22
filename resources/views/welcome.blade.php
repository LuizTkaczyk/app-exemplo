{{-- Conteudo que aparecerá no layout main --}}

@extends('layouts.main')

@section('title', 'LARAVEL no grau')

@section('content')
    
    <div id="search-container" class="col-md-12">
        
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por : {{ $search }}</h2>
        @else
            <h2>Próximos eventos</h2>
            <p class="subtitle">Eventos dos próximos dias</p>
        @endif

        
        <div id="cards-container" class="row">
            {{-- RECEBENDO OS DADOS DO BANCO DE DADOS --}}
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $evento->imagem }}" alt="{{$evento->titulo}}">
                    <div class="card-body">
                        {{-- inserindo a data no formato correto no front --}}
                        <p class="card-date">{{ date('d/m/Y', strtotime($evento->data)) }}</p>
                        <h5 class="card-title"> {{ $evento->titulo}}</h5>
                        <p class="card-participants">X Parcipantes</p>
                        <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach

            {{-- Verificando se há o evento pesquisado , caso não , ele retorna um link para a home --}}
            @if (count($eventos)==0 && $search)
                <p>Não foi possivel encontrar nenhum evento com {{ $search}}! <a href="/">Ver todos</a></p>
            @elseif(count($eventos)==0)
                <p>Não há eventos disponíveis!</p>
            @endif
        </div>
    </div>
    
@endsection
{{-- Conteudo que aparecerá no layout main --}}

@extends('layouts.main')

@section('title', 'LARAVEL no grau')

@section('content')
    
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p>Eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            {{-- RECEBENDO OS DADOS DO BANCO DE DADOS --}}
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $evento->imagem }}" alt="{{$evento->titulo}}">
                    <div class="card-body">
                        <p class="card-date">22/02/2022</p>
                        <h5 class="card-title"> {{ $evento->titulo}}</h5>
                        <p class="card-participants">X Parcipantes</p>
                        <a href="#" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
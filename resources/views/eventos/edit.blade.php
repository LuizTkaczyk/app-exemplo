@extends('layouts.main')

@section('title', 'Editando:' . $evento->titulo)

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando : {{ $evento->titulo }}</h1>
        {{-- com enctype é possivel add imagens --}}
        <form action="/eventos/update/{{ $evento->id }}" method="POST" enctype="multipart/form-data">
            {{-- csrf é obrigatório para inserir dados no banco --}}
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="imagem" name="imagem" class="from-control-file">
                <img src="/img/eventos/{{ $evento->imagem }}" alt="{{ $evento->titulo }}" class="img-preview">
            </div>

            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento"
                    value="{{ $evento->titulo }}">
            </div>

            {{-- Inserindo a data do evento --}}
            <div class="form-group">
                <label for="date">Data do evento:</label>
                {{-- <input type="date" class="form-control" id="data" value="{{ $evento->data->format('Y-m-d') }}"> --}}
                <input type="date" class="form-control" id="data" value="{{ date('Y-m-d', strtotime($evento->data)) }}">
            </div>

            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento"
                    value="{{ $evento->cidade }}">
            </div>

            <div class="form-group">
                <label for="title">Evento privado ?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{$evento->privado == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Descrição do evento:</label>
                <textarea class="form-control" name="descricao" id="descricao"
                    placeholder="Sobre o que vai ser o evento"> {{$evento->descricao}}</textarea>
            </div>

            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    {{-- O nome que esta em value é que aparecera no banco de dados --}}
                    <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco">Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja gratis">Cerveja gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food">Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes">Brindes
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Editar evento">

        </form>
    </div>




@endsection

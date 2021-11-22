@extends('layouts.main')

@section('title', 'Criar eventos')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie seu eventos</h1>
        {{-- com enctype é possivel add imagens --}}
        <form action="/eventos" method="POST" enctype="multipart/form-data">
            {{-- csrf é obrigatório para inserir dados no banco --}}
            @csrf

            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="imagem" name="imagem" class="from-control-file">
            </div>

            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
            </div>

            {{-- Inserindo a data do evento --}}
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="data" name="data">
            </div>

            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento">
            </div>

            <div class="form-group">
                <label for="title">Evento privado ?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Descrição do evento:</label>
                <textarea class="form-control" name="descricao" id="descricao" placeholder="Sobre o que vai ser o evento"></textarea>
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

            <input type="submit" class="btn btn-primary" value="Criar evento">

        </form>
    </div>


    
@endsection
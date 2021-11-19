@extends('layouts.main')

@section('title', 'Criar eventos')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie seu eventos</h1>
        <form action="/eventos" method="POST">
            {{-- csrf é obrigatório para inserir dados no banco --}}
            @csrf
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
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

            <input type="submit" class="btn btn-primary" value="Criar evento">

        </form>
    </div>


    
@endsection
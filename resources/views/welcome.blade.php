{{-- Conteudo que aparecerá no layout main --}}

@extends('layouts.main')

@section('title', 'LARAVEL no grau')

@section('content')
    
    <h1>Usando o {{ $nome }}</h1>

    <img src="/img/img1.jpg" width="400px" alt="" srcset="">

    @if (10 > 5)
    <p>Condição verdadeira</p>
    @endif


    <p>{{ $nome }}</p>

    @if ($nome == "Maria")
    <p>O nome é Maria</p>    

    @elseif($nome == "Ana")
    <p> O nome é {{$nome }} e tem {{$idade}} anos, e trabalha como {{$profissao}}</p>
    @else
    <p>O nome não é Maria</p>
    @endif


    @for ($i = 0; $i < count($array); $i++)
        <p>{{ $array[$i] }}  - {{$i}} </p>
    @endfor

    
    @foreach ($nomes as $nome)
       <p> {{ $loop -> index}}</p>
       <p> {{ $nome }}</p>
        
    @endforeach
@endsection
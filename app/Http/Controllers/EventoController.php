<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $nome = "Laravel";
        $idade = 99;

        $array = [1,2,3,4,5];
        $nomes = ["João", "Maria", "José"];

        return view('welcome', [
            'nome' => $nome,
            'idade'=> $idade,
            'profissao' => "Vida bandida",
            'array' => $array,
            'nomes' => $nomes

        ]);
    }

    public function criar(){
        return view('events.criar');
    }

    public function contato(){
        return view('contato');
    }

    public function produtos(){
        $busca = request('buscar');
        return view('produtos', ['busca' => $busca]);
    }

    public function produto($id){
        return view('produto', ['id' => $id]);
    }
}
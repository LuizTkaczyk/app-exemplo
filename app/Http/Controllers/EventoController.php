<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::all();

        return view('welcome', ['eventos' => $eventos]);
    }

    public function criar(){
        return view('eventos.criar');
    }

    public function contato(){
        
        return view('contato');
        
        
    }

    public function store(Request $request){
        //echo '<script>console.log("teste")</script>';

        $evento = new Evento;

        //todos esses dados vem do bd
        $evento->titulo = $request->titulo;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;

        //salvando os dados no banco de forma persistente
        $evento->save();
        //ao termino é redirecinado a página principal
        return redirect('/');
    }
}
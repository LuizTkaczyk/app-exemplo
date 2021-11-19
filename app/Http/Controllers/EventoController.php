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

    // public function contato(){
        
    //     return view('contato');
        
        
    // }

    public function store(Request $request) {
        //echo '<script>console.log("teste")</script>';

        $evento = new Evento;

        //todos esses dados vem do bd
        $evento->titulo = $request->titulo;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;

        // imagem upload
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('img/eventos'), $imagemNome);

            $evento->imagem = $imagemNome;
        }


        $evento->save();

        //salvando os dados no banco de forma persistente
        //ao termino é redirecinado a página principal
        return redirect('/')-> with('msg', 'Evento criado com sucesso!');

        //em caso de erros usar php artisan optimize
    }

    public function show($id){
        $evento = Evento::findOrFail($id);

        return view('eventos.show', ['evento' => $evento]);
    }
}
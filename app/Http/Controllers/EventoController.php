<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\User;

class EventoController extends Controller
{
    public function index(){
        // fazendo referencia ao name="search" do front end, e fazendo a pesquisa
        $search = request('search');

        if($search){
            $eventos = Evento::where([
                // fazendo a busca atraves do titulo
                ['titulo', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $eventos = Evento::all();
        }

        return view('welcome', ['eventos' => $eventos, 'search'=>$search]);
    }

    public function criar(){
        return view('eventos.criar');
    }


    //Função para salvar os dados no banco
    public function store(Request $request) {
        //echo '<script>console.log("teste")</script>';

        $evento = new Evento;

        //todos esses dados vem do bd
        $evento->titulo = $request->titulo;
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->items = $request->items;

        // imagem upload
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('img/eventos'), $imagemNome);

            $evento->imagem = $imagemNome;
        }

        //para criar um evento o usuario tem que estar logado
        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save();

        //salvando os dados no banco de forma persistente
        //ao termino é redirecinado a página principal
        return redirect('/')-> with('msg', 'Evento criado com sucesso!');

        //em caso de erros usar php artisan optimize   
    }

    // $id vem do front
    public function show($id){
        $evento = Evento::findOrFail($id);

        // capturando o id do usuario logado
        $eventOwner = User::where('id', $evento->user_id)->first()->toArray();

        //da pasta eventos vem a view show
        return view('eventos.show', ['evento' => $evento, 'eventOwner' => $eventOwner]);
    }
    

    public function dashboard(){
        $user = auth()->user();
        $eventos = $user->eventos;
        return view('eventos.dashboard',['eventos' => $eventos]);
    }

    //função para deletar um objeto
    public function destroy($id){
        Evento::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }
}
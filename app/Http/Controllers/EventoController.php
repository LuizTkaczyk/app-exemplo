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

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('eventos.dashboard',
            ['eventos' => $eventos, 'eventsasparticipant' => $eventsAsParticipant]
        );

    }

    //função para deletar um objeto
    public function destroy($id){
        Evento::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }


    //função de editar os eventos
    public function edit($id){
        $user = auth()->user();

        $evento = Evento::findOrFail($id);

        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }

        return view('eventos.edit', ['evento' => $evento]);

    }

    //metodo que atualiza o evento
    public function update(Request $request){

        $data = $request->all();

        // imagem upload editada
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('img/eventos'), $imagemNome);

            $data['imagem'] = $imagemNome;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    //confirmando a entrada em um evento associando o id
    public function joinEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $evento = Evento::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $evento->titulo);
    }


    //saindo de um evento
    public function leaveEvent($id){
        $user = auth()->user();
        $user -> eventsAsParticipant()->detach($id);
        $evento = Evento::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $evento->titulo);
    }


}
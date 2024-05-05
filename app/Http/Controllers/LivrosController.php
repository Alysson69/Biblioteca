<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestLivros;
use App\Models\Livros;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    public function __construct(Livros $livros) {
        $this->livros = $livros;
    }
    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $getLivros = $this->livros->getLivrosPesquisa(search: $pesquisar ?? '');

        return view('livros.paginacao', compact('getLivros'));
    }
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Livros::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }
    public function cadastrarLivro(FormRequestLivros $request){
        if($request->method() == "POST"){
            $livro = new Livros();
            $livro->nome = $request->input('nome');
            $livro->save();

            return redirect()->route('livros.index');
        };
        return view('livros.create');
    }

    public function atualizarLivro(FormRequestLivros $request , $id){
        
        if($request->method() == "PUT"){
            $getLivro = Livros::where('id', $id)->first();
            $getLivro->nome = $request->input('nome');
            $getLivro->update();

            return redirect()->route('livros.index');
        };
        $getLivro = Livros::where('id', $id)->first();

        return view('livros.atualiza', compact('getLivro'));
    }

}

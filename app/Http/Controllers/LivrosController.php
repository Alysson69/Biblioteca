<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;

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
    public function cadastrarLivro(Request $request){
        if($request->method() == "POST"){

        };
        return view('livros.create');
    }
}

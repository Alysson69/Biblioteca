<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestAlugueis;
use App\Models\Alugueis;
use App\Models\Usuarios;
use App\Models\Livros;
use Illuminate\Http\Request;

class AlugueisController extends Controller
{
    public function __construct(Alugueis $alugueis) {
        $this->alugueis = $alugueis;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $getAlugueis = $this->alugueis->getAlugueisPesquisa(search: $pesquisar ?? '');

        return view('alugueis.paginacao', compact('getAlugueis'));
    }

    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Alugueis::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarAluguel(FormRequestAlugueis $request){

        $usuarios = Usuarios::all();
        $livros = Livros::all();
        $alugueis = Alugueis::all();

        if($request->method() == "POST"){
            foreach($alugueis as $aluguel ) {       
                if( $aluguel->livro_id == $request->livro_id) {
                    if($request->data_inicial >= $aluguel->data_inicial && $request->data_inicial <= $aluguel->data_final || $request->data_final >= $aluguel->data_inicial && $request->data_final <= $aluguel->data_final){
                        $errorData = "Periodo de Locação Indisponivel";
                        return view('alugueis.create', compact('usuarios', 'livros', 'errorData'));
                    }
                }
            }
            $aluguel = new Alugueis();
            $aluguel->usuario_id = $request->input('usuario_id');
            $aluguel->livro_id = $request->input('livro_id');
            $aluguel->data_inicial = $request->input('data_inicial');
            $aluguel->data_final = $request->input('data_final');
            $aluguel->save();

            return redirect()->route('alugueis.index');
        };

        return view('alugueis.create', compact('usuarios', 'livros'));
    }

    public function atualizarAluguel(FormRequestAlugueis $request , $id){
        $usuarios = Usuarios::all();
        $livros = Livros::all();
        if($request->method() == "PUT"){
            $getAluguel = Alugueis::where('id', $id)->first();
            $aluguel->usuario_id = $request->input('usuario_id');
            $aluguel->livro_id = $request->input('livro_id');
            $aluguel->data_inicial = $request->input('data_inicial');
            $aluguel->data_final = $request->input('data_final');
            $getAluguel->update();

            return redirect()->route('alugueis.index');
        };
        $getAluguel = Alugueis::where('id', $id)->first();

        return view('alugueis.atualiza', compact('getAluguel','usuarios', 'livros'));
    }

}

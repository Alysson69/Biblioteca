<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuarios;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function __construct(Usuarios $usuarios) {
        $this->usuarios = $usuarios;
    }
    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $getUsuarios = $this->usuarios->getUsuariosPesquisa(search: $pesquisar ?? '');

        return view('usuarios.paginacao', compact('getUsuarios'));
    }
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Usuarios::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true]);
    }
    public function cadastrarUsuario(FormRequestUsuarios $request){
        if($request->method() == "POST"){
            $usuario = new Usuarios();
            $usuario->nome = $request->input('nome');
            $usuario->cpf = $request->input('cpf');
            $usuario->save();

            return redirect()->route('usuarios.index');
        };
        return view('usuarios.create');
    }

    public function atualizarUsuario(FormRequestUsuarios $request , $id){
        
        if($request->method() == "PUT"){
            $getUsuario = Usuarios::where('id', $id)->first();
            $getUsuario->nome = $request->input('nome');
            $getUsuario->cpf = $request->input('cpf');
            $getUsuario->update();

            return redirect()->route('usuarios.index');
        };
        $getUsuario = Usuarios::where('id', $id)->first();

        return view('usuarios.atualiza', compact('getUsuario'));
    }

}

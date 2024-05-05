<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    
    public function getUsuariosPesquisa(string $search = '') {
        $usuarios = $this->where(function ($query) use ($search){
            if( $search){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
                $query->orWhere('cpf', 'LIKE', "%{$search}%");
            }
        })->get();
        return $usuarios;
    }
}

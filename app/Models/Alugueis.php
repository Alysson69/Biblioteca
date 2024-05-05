<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    use HasFactory;

    public function getAlugueisPesquisa(string $search = '') {
        $alugueis = '';
        $alugueis = $this->where(function ($query) use ($search){
            if( $search){
                $query->where('livro_id', $search);
                $query->orWhere('livro_id', 'LIKE', "%{$search}%");
                $query->orWhere('usuario_id', 'LIKE', "%{$search}%");
            }
        })->get();
        return $alugueis;
    }

    public function livro()
    {
        return $this->belongsTo(Livros::class);
    }
    
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    public function getLivrosPesquisa(string $search = '') {
        $livros = $this->where(function ($query) use ($search){
            if( $search){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();
        return $livros;
    }
}



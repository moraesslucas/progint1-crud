<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';
    protected $fillable = ['titulo', 'anopublicacao', 'edicao', 'editora', 'id_fornecedor'];

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor', 'id_fornecedor');
    }
}

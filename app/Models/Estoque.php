<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoques';
    protected $fillable = ['id_livro', 'id_funcionario', 'quant_total', 'quant_recebida', 'dataatualizacao'];

    public function livro()
    {
        return $this->belongsTo('App\Models\Livro', 'id_livro');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario', 'id_funcionario');
    }
}

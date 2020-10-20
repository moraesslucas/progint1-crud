<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Funcionario;
use App\Models\Livro;
use Illuminate\Http\Request;

class EstoquesController extends Controller
{

    protected $validations = [
        'quant_total' => 'required|numeric',
        'quant_recebida' => 'required|numeric',
        'dataatualizacao' => 'required|date'
    ];

    protected $messages = [
        'quant_total.required' => 'A quantidade total é um campo obrigatório',
        'quant_total.numeric' => 'A quantidade total deve ser um número',
        'quant_recebida.required' => 'A quantidade recebida é um campo obrigatório',
        'quant_recebida.numeric' => 'A quantidade recebida deve ser um número',
        'dataatualizacao.required' => 'A data de atualização é um campo obrigatório',
        'dataatualizacao.date' => 'A data de atualização deve ser uma data'
    ];

    public function create() {
        $livros = Livro::all();
        $funcionarios = Funcionario::all();

        return view('estoques.create', ['livros' => $livros, 'funcionarios' => $funcionarios]);
    }

    public function edit($id) {
        $estoque = Estoque::findOrFail($id);
        $livros = Livro::all();
        $funcionarios = Funcionario::all();

        return view('estoques.edit', ['estoque' => $estoque, 'livros' => $livros, 'funcionarios' => $funcionarios]);
    }

    public function update($id, Request $request) {
        $request->validate($this->validations, $this->messages);
        $estoque = Estoque::findOrFail($id);

        $estoque->update([
            'quant_total' => $request->quant_total,
            'quant_recebida' => $request->quant_recebida,
            'dataatualizacao' => $request->dataatualizacao
        ]);

        return redirect()->route('exibir_estoques')->with('flash_message', 'Estoque atualizado com sucesso.');
    }

    public function delete($id) {
        $estoque = Estoque::findOrFail($id);
        $estoque->delete();
        return redirect()->route('exibir_estoques')->with('flash_message', 'Estoque removido com sucesso.');
    }


    public function showAll() {
        $estoques = Estoque::all();

        return view('estoques.read', ['estoques' => $estoques]);
    }

    public function store(Request $request) {
        $request->validate($this->validations, $this->messages);
        Estoque::create([
            'quant_total' => $request->quant_total,
            'quant_recebida' => $request->quant_recebida,
            'dataatualizacao' => $request->dataatualizacao,
            'id_livro' => $request->livro,
            'id_funcionario' => $request->funcionario
        ]);
        return redirect()->route('exibir_estoques')->with('flash_message', 'Estoque criado com sucesso.');
    }
}

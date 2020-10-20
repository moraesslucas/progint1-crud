<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function create() {
        return view('fornecedores.create');
    }

    public function edit($id) {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', ['fornecedor' => $fornecedor]);
    }

    public function update($id, Request $request) {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'telefone' => $request->telefone
        ]);

        return $this->showAll('Fornecedor atualizado com sucesso.');
    }

    public function delete($id) {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return $this->showAll('Fornecedor removido com sucesso.');
    }


    public function showAll($message = null) {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.read', ['fornecedores' => $fornecedores, 'message' => $message]);
    }

    public function store(Request $request) {
        Fornecedor::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'telefone' => $request->telefone
        ]);
        return $this->showAll('Fornecedor criado com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{

    protected $validations = [
        'nome' => 'required|max:255',
        'endereco' => 'required|max:255',
        'cidade' => 'required|max:255',
        'telefone' => 'required|phone_number'
    ];

    protected $messages = [
        'nome.required' => 'O nome é um campo obrigatório',
        'nome.max' => 'O nome deve ter até 255 caracteres',
        'endereco.required' => 'O endereço é obrigatório',
        'endereco.max' => 'O endereço deve ter até 255 caracteres',
        'cidade.required' => 'A cidade é obrigatória',
        'cidade.max' => 'A cidade deve ter até 255 caracteres',
        'telefone.required' => 'O telefone é obrigatório',
        'telefone.phone_number' => 'O telefone deve ser no formato (##) ####-#### ou (##) #####-####'
    ];

    public function create() {
        return view('fornecedores.create');
    }

    public function edit($id) {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', ['fornecedor' => $fornecedor]);
    }

    public function update($id, Request $request) {
        $request->validate($this->validations, $this->messages);

        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'telefone' => $request->telefone
        ]);

        return redirect()->route('exibir_fornecedores')->with('flash_message', 'Fornecedor atualizado com sucesso.');
    }

    public function delete($id) {
        $fornecedor = Fornecedor::findOrFail($id);
        try {
            $fornecedor->delete();
        } catch (QueryException $e) {
            return redirect()->route('exibir_fornecedores')->with([
                'flash_message' => 'O fornecedor não pode ser removido pois tem livros vinculados a ele.',
                'type' => 'danger'
            ]);
        }
        return redirect()->route('exibir_fornecedores')->with('flash_message', 'Fornecedor removido com sucesso.');
    }


    public function showAll() {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.read', ['fornecedores' => $fornecedores]);
    }

    public function store(Request $request) {
        $request->validate($this->validations, $this->messages);
        Fornecedor::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'telefone' => $request->telefone
        ]);
        return redirect()->route('exibir_fornecedores')->with('flash_message', 'Fornecedor criado com sucesso.');
    }
}

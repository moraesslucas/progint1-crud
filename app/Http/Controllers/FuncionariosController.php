<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function create() {
        return view('funcionarios.create');
    }

    public function edit($id) {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', ['funcionario' => $funcionario]);
    }

    public function update($id, Request $request) {
        $funcionario = Funcionario::findOrFail($id);

        $funcionario->update([
            'nome' => $request->nome,
            'datacontratacao' => $request->datacontratacao
        ]);

        return $this->showAll('Funcionario atualizado com sucesso.');
    }

    public function delete($id) {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return $this->showAll('Funcionario removido com sucesso.');
    }


    public function showAll($message = null) {
        $funcionarios = Funcionario::all();
        return view('funcionarios.read', ['funcionarios' => $funcionarios, 'message' => $message]);
    }

    public function store(Request $request) {
        Funcionario::create([
            'nome' => $request->nome,
            'datacontratacao' => $request->datacontratacao
        ]);
        return $this->showAll('Funcionario criado com sucesso.');
    }
}

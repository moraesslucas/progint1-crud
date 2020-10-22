<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Livro;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivrosController extends Controller
{

    private $validations = [
        'titulo' => 'required',
        'anopublicacao' => 'required|numeric|gt:1500',
        'editora' => 'required',
        'edicao' => 'required|numeric|gt:0'
    ];

    private $messages = [
        'titulo.required' => 'Título é um campo obrigatório',
        'anopublicacao.required' => 'Ano de publicação é um campo obrigatório',
        'anopublicacao.numeric' => 'Ano de publicação deve ser um número',
        'anopublicacao.gt' => 'Ano de publicação deve ser maior que 1500',
        'editora.required' => 'Editora é um campo obrigatório',
        'edicao.required' => 'Edição é um campo obrigatório',
        'edicao.numeric' => 'Edição deve ser um número',
        'edicao.gt' => 'Edição deve ser maior que 0'
    ];

    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('livros.create', ['fornecedores' => $fornecedores]);
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $fornecedores = Fornecedor::all();

        return view('livros.edit', ['livro' => $livro, 'fornecedores' => $fornecedores]);
    }

    public function update($id, Request $request)
    {
        $request->validate($this->validations, $this->messages);

        $livro = Livro::findOrFail($id);

        $livro->update([
            'titulo' => $request->titulo,
            'anopublicacao' => $request->anopublicacao,
            'edicao' => $request->edicao,
            'editora' => $request->editora,
            'id_fornecedor' => $request->fornecedor
        ]);

        return redirect()->route('exibir_livros')->with('flash_message', 'Livro atualizado com sucesso.');
    }

    public function delete($id, Request $request)
    {
        $livro = Livro::findOrFail($id);
        try {
            $livro->delete();
        } catch (QueryException $e) {
            return redirect()->route('exibir_livros')->with([
                'flash_message' => 'O livro não pode ser removido pois tem estoques vinculados a ele.',
                'type' => 'danger'
            ]);
        }

        return redirect()->route('exibir_livros')->with('flash_message', 'Livro removido com sucesso.');
    }


    public function showAll()
    {
        $livros = Livro::all();
        return view('livros.read', ['livros' => $livros]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->messages);

        Livro::create([
            'titulo' => $request->titulo,
            'anopublicacao' => $request->anopublicacao,
            'edicao' => $request->edicao,
            'editora' => $request->editora,
            'id_fornecedor' => $request->fornecedor
        ]);

        return redirect()->route('exibir_livros')->with('flash_message', 'Livro criado com sucesso.');
    }

}

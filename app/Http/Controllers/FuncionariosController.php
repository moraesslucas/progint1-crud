<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{

    protected $validations = [
        'nome' => 'required|max:255',
        'datacontratacao' => 'required|date'
    ];

    protected $messages = [
        'nome.required' => 'Nome é um campo obrigatório',
        'nome.max' => 'Nome deve ter no máximo 255 caracteres',
        'datacontratacao.required' => 'A data de contratação é obrigatória',
        'datacontratacao.date' => 'A data de contratação deve ser uma data'
    ];

    public function create()
    {
        return view('funcionarios.create');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', ['funcionario' => $funcionario]);
    }

    public function update($id, Request $request)
    {
        $funcionario = Funcionario::findOrFail($id);

        $request->validate($this->validations, $this->messages);

        $funcionario->update([
            'nome' => $request->nome,
            'datacontratacao' => $request->datacontratacao
        ]);

        return redirect()->route('exibir_funcionarios')->with('flash_message', 'Funcionário atualizado com sucesso.');
    }

    public function delete($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        try {
            $funcionario->delete();
        } catch (QueryException $e) {
            return redirect()->route('exibir_funcionarios')->with([
                'flash_message' => 'O funcionário não pode ser removido pois tem estoques vinculados a ele.',
                'type' => 'danger'
            ]);
        }
        return redirect()->route('exibir_funcionarios')->with('Funcionário removido com sucesso.');
    }


    public function showAll()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.read', ['funcionarios' => $funcionarios]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->messages);
        Funcionario::create([
            'nome' => $request->nome,
            'datacontratacao' => $request->datacontratacao
        ]);
        return redirect()->route('exibir_funcionarios')->with('Funcionário criado com sucesso.');
    }

    public function mostSupplies()
    {
        $funcionarios = DB::table('funcionarios')
            ->select('funcionarios.id', 'funcionarios.nome')
            ->addSelect(DB::raw('coalesce(sum(estoques.quant_total), 0) as total'))
            ->leftJoin('estoques', 'estoques.id_funcionario', '=', 'funcionarios.id')
            ->groupBy( 'funcionarios.id')
            ->orderBy('total', 'DESC')
            ->get();

        return view('funcionarios.mostsupplies', ['funcionarios' => $funcionarios]);
    }

    public function mostBooks()
    {
        $funcionarios = DB::table('funcionarios')
            ->select('funcionarios.id', 'funcionarios.nome')
            ->addSelect(DB::raw('count(estoques.id_livro) as total'))
            ->leftJoin('estoques', 'estoques.id_funcionario', '=', 'funcionarios.id')
            ->groupBy( 'funcionarios.id')
            ->orderBy('total', 'DESC')
            ->get();

        return view('funcionarios.mostbooks', ['funcionarios' => $funcionarios]);
    }
}

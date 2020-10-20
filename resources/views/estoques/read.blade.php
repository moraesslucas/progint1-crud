@extends('base')

@section('main')
    <br/>
    <h2>Estoques</h2>
    <a href="{{ route('criar_estoque') }}" class="float-right">
        <i class="fa fa-plus" aria-hidden="true"></i> Adicionar estoque
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Quantidade Total</th>
                <th>Quantidade Recebida</th>
                <th>Recebido por</th>
                <th>Livro</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estoques as $estoque)
                <tr>
                    <td>{{ $estoque->id }}</td>
                    <td>{{ $estoque->quant_total }}</td>
                    <td>{{ $estoque->quant_recebida }}</td>
                    <td>{{ $estoque->funcionario->nome }}</td>
                    <td>{{ sprintf("%s - Edição: %s - %s", $estoque->livro->titulo, $estoque->livro->edicao, $estoque->livro->editora) }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('editar_estoque', $estoque->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('excluir_estoque', $estoque->id) }}" method="post">
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

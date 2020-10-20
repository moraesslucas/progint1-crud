@extends('base')

@section('main')
    <div class="col-md-9">
        @if($message != null)
            <br/>
            <div class="alert alert-primary" role="alert">
                {{ $message }}
            </div>
        @endif
        <h2>Fornecedores</h2>
        <a href="{{ route('criar_fornecedor') }}" class="float-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Adicionar fornecedor
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->endereco }}</td>
                        <td>{{ $fornecedor->cidade }}</td>
                        <td>{{ $fornecedor->telefone }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('editar_fornecedor', $fornecedor->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <form action="{{ route('excluir_fornecedor', $fornecedor->id) }}" method="post">
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
    </div>
@endsection

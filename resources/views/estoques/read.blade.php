@extends('base')

@section('main')
    <div class="col-md-9">
        @if($message != null)
            <br/>
            <div class="alert alert-primary" role="alert">
                {{ $message }}
            </div>
        @endif
        <h2>Funcionários</h2>
        <a href="{{ route('criar_funcionario') }}" class="float-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Adicionar funcionário
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data contratação</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->datacontratacao }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('editar_funcionario', $funcionario->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <form action="{{ route('excluir_funcionario', $funcionario->id) }}" method="post">
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

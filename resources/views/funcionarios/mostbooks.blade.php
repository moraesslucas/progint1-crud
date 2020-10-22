@extends('base')

@section('main')
    <br/>
    <h2>Funcionários que atualizaram maior quantidade de livros</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome do Funcionário</th>
                <th>Quantidade total de livros atualizados</th>
            </tr>
            </thead>
            <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

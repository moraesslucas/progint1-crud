@extends('base')

@section('main')
    <br/>
    <h2>Fornecedores que disponibilizaram mais edições por livro</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome do Fornecedor</th>
                <th>Título do Livro</th>
                <th>Quantidade de edições</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->titulo }}</td>
                    <td>{{ $fornecedor->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

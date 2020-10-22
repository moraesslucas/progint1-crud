@extends('base')

@section('main')
    <br/>
    <h2>Fornecedores que disponibilizaram mais livros</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome do Fornecedor</th>
                <th>Quantidade de livros</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

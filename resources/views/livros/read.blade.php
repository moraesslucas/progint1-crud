@extends('base')

@section('main')
    <br/>

    <h2>Livros</h2>
    <a href="{{ route('criar_livro') }}" class="float-right">
        <i class="fa fa-plus" aria-hidden="true"></i> Adicionar livro
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Ano de publicação</th>
                <th>Edição</th>
                <th>Editora</th>
                <th>Nome fornecedor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->anopublicacao }}</td>
                    <td>{{ $livro->edicao }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>{{ $livro->fornecedor->nome }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('editar_livro', $livro->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('excluir_livro', $livro->id) }}" method="post">
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

@extends('base')

@section('main')
    <br/>
    <h2>Adicionar livro</h2>
    <form action="{{ route('criar_livro') }}" method="POST">
        @csrf
        <div class="form-group col-sm-12">
            <label for="titulo" class="col-sm-12 col-md-3">Título</label><br/>
            <input id="titulo" class="col-sm-12 col-md-9" type="text" name="titulo"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-12 col-md-3" for="anopublicacao">Ano de publicação</label><br/>
            <input id="anopublicacao" class="col-sm-12 col-md-9" type="number" min="1500" name="anopublicacao"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-12 col-md-3" for="edicao">Edição</label><br/>
            <input id="edicao" class="col-sm-12 col-md-9" type="number" min="0" name="edicao"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label for="editora" class="col-sm-12 col-md-3">Editora</label><br/>
            <input id="editora" class="col-sm-12 col-md-9" type="text" name="editora"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label for="fornecedor" class="col-sm-12 col-md-3">Fornecedor</label>
            <select id="fornecedor" class="col-sm-12 col-md-9" name="fornecedor">
                @foreach($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            </select>
        </div>
        <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
    </form>
@endsection

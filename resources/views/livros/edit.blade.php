@extends('base')

@section('main')
    <br/>
    <h2>Editar funcionário</h2>
    <form action="{{ route('alterar_livro', $livro->id) }}" method="POST">
        @csrf
        <div class="row">
            @csrf
            <div class="form-group col-sm-12">
                <label for="titulo" class="col-sm-12 col-md-3">Título</label><br/>
                <input value="{{ $livro->titulo }}" id="titulo" class="col-sm-12 col-md-9" type="text"
                       name="titulo"><br/>
            </div>
            <div class="form-group col-sm-12">
                <label class="col-sm-12 col-md-3" for="anopublicacao">Ano de publicação</label><br/>
                <input value="{{ $livro->anopublicacao }}" id="anopublicacao" class="col-sm-12 col-md-9"
                       type="number" min="1500" name="anopublicacao"><br/>
            </div>
            <div class="form-group col-sm-12">
                <label class="col-sm-12 col-md-3" for="edicao">Edição</label><br/>
                <input value="{{ $livro->edicao }}" id="edicao" class="col-sm-12 col-md-9" type="number" min="0"
                       name="edicao"><br/>
            </div>
            <div class="form-group col-sm-12">
                <label for="editora" class="col-sm-12 col-md-3">Editora</label><br/>
                <input value="{{ $livro->editora }}" id="editora" class="col-sm-12 col-md-9" type="text"
                       name="editora"><br/>
            </div>
            <div class="form-group col-sm-12">
                <label for="fornecedor" class="col-sm-12 col-md-3">Fornecedor</label>
                <select id="fornecedor" class="col-sm-12 col-md-9" name="fornecedor">
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}"
                                @if($fornecedor->id == $livro->id_fornecedor)
                                selected="true"
                            @endif
                        >
                            {{ $fornecedor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
        </div>
        @method('put')
    </form>
@endsection

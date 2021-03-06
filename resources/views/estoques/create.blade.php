@extends('base')

@section('main')
    <br/>
    <h2>Adicionar estoque</h2>

    <form action="{{ route('criar_estoque') }}" method="POST">
        @csrf
        <div class="form-group col-sm-12">
            <label for="livro" class="col-sm-12 col-md-3">Livro</label>
            <select id="livro" class="col-sm-12 col-md-9" name="livro">
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ sprintf("%s - Edição: %s - %s", $livro->titulo, $livro->edicao, $livro->editora) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label for="funcionario" class="col-sm-12 col-md-3">Funcionário</label>
            <select id="funcionario" class="col-sm-12 col-md-9" name="funcionario">
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-12 col-md-3" for="quant_total">Quantidade Total</label><br/>
            <input id="quant_total" class="col-sm-12 col-md-9" type="number" min="0" name="quant_total"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-12 col-md-3" for="quant_recebida">Quantidade Recebida</label><br/>
            <input id="quant_recebida" class="col-sm-12 col-md-9" type="number" min="0" name="quant_recebida"><br/>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-12 col-md-3" for="dataatualizacao">Data Atualização</label><br/>
            <input id="dataatualizacao" class="col-sm-12 col-md-9" type="date" name="dataatualizacao"
                   min="1970-01-01"><br/>
        </div>
        <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
    </form>
@endsection

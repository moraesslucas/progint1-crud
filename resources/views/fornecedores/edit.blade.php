@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar fornecedor</h2>
        </div>
        <div class="col-sm-12">
            <form action="{{ route('alterar_fornecedor', $fornecedor->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="nome" class="col-sm-12 col-md-3">Nome</label><br/>
                        <input id="nome" value="{{$fornecedor->nome}}" class="col-sm-12 col-md-9" type="text" name="nome"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="endereco">Endereço</label><br/>
                        <input id="endereco" value="{{$fornecedor->endereco}}" class="col-sm-12 col-md-9" type="text" name="endereco"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="cidade">Cidade</label><br/>
                        <input id="cidade" value="{{$fornecedor->cidade}}" class="col-sm-12 col-md-9" type=" text"
                               name="cidade"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="telefone">Telefone</label><br/>
                        <input id="telefone" value="{{$fornecedor->telefone}}" class="col-sm-12 col-md-9" type="text" name="telefone"><br/><br/>
                    </div>
                    <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
                </div>
                @method('put')
            </form>
        </div>
@endsection

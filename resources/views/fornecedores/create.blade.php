@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h2>Criar fornecedor</h2>
        </div>
        <div class="col-sm-12">
            <form action="{{ route('criar_fornecedor') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="nome" class="col-sm-12 col-md-3">Nome</label><br/>
                        <input id="nome" class="col-sm-12 col-md-9" type="text" name="nome"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="endereco">Endereço</label><br/>
                        <input id="endereco" class="col-sm-12 col-md-9" type="text" name="endereco"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="cidade">Cidade</label><br/>
                        <input id="cidade" class="col-sm-12 col-md-9" type=" text" name="cidade"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="telefone">Telefone</label><br/>
                        <input id="telefone" class="col-sm-12 col-md-9" type="text" name="telefone"><br/><br/>
                    </div>
                    <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
@endsection

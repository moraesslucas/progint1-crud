@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h2>Criar funcionário</h2>
        </div>
        <div class="col-sm-12">
            <form action="{{ route('criar_funcionario') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="nome" class="col-sm-12 col-md-3">Nome</label><br/>
                        <input id="nome" class="col-sm-12 col-md-9" type="text" name="nome"><br/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12 col-md-3" for="datacontratacao">Data Contratação</label><br/>
                        <input id="datacontratacao" class="col-sm-12 col-md-9" type="text" name="datacontratacao"><br/>
                    </div>
                    <input class="col-sm-12 btn btn-primary" type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
@endsection

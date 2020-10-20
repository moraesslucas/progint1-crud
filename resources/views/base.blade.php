<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Administrativo</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Biblioteca</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('exibir_fornecedores')}}">
                            Fornecedores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('exibir_funcionarios')}}">
                            Funcionários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('exibir_livros')}}">
                            Livros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('exibir_estoques')}}">
                            Estoques
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="col-sm-12 col-md-9">
            @include('alerts')
            @yield('main')
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    setTimeout(function () {
        // $, jQuery, Vue is all ready to use now
        $(document).ready(function () {
            var PhoneMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                phoneOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(PhoneMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#telefone').mask(PhoneMaskBehavior, phoneOptions);
        })}, 100);
</script>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Farmacia')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/farmacia.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body class="container">

    <header class="pt-4 pb-5 d-flex align-items-center justify-content-between con-header">
        <a href="#" class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/images/farmacia.png') }}" alt="" width="40">
            <h1 class="mb-0"> Farma</h1>
        </a>
        <nav id="nav" class="navi">
            <a href="#" class="logo" id="logo">
                <img src="{{ asset('assets/images/farmacia.png') }}" alt="" width="70">
                <h1 class="mb-0"> Farma</h1>
            </a>

            <ul class="d-flex list-unstyled mb-0">
                <li class="ms-3">
                    <a href="{{ route('pedidos.index') }}">Lista de Pedidos</a>
                </li>
                <li class="ms-3">
                    <a href="{{ route('pedidos.create') }}">Realizar Pedido</a>
                </li>
            </ul>
        </nav>

        <div class="nav-responsive">
            <i class="fa-solid fa-bars" id="ponerse"></i>
            <i class="fa-solid fa-xmark" id="quitarse"></i>
        </div>
    </header>


    <div class="container">
        @yield('content')
    </div>



    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/app.js') }}" type="module" defer></script> -->
</body>

</html>
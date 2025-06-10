<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siegle Vehicules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Siegle Veículos</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendedores.index') }}">Vendedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('carros.index') }}">Carros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('compras.index') }}">Compras</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendas.index') }}">Vendas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

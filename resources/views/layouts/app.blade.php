<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Siegle Veículos</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚗</text></svg>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #0056b3;
            --primary-hover-color: #004085;
            --secondary-color: #6c757d;
            --accent-color: #17A2B8;
            --warning-color: #FFC107;
            --danger-color: #DC3545;
            --success-color: #28a745;
            --background-light: #F8F9FA;
            --text-dark: #212529;
            --border-light: #dee2e6;
            --navbar-dark-start: #0A1C3D;
            --navbar-dark-end: #1B3A6B;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .navbar {
            background: linear-gradient(90deg, var(--navbar-dark-start) 0%, var(--navbar-dark-end) 100%);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
            padding: 1rem 1.5rem;
            margin-bottom: 2.5rem;
            border-radius: 0;
            overflow: hidden;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #E0F2F7 !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
            letter-spacing: 0.05em;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 0.75rem;
            border-radius: 0.75rem;
            padding: 0.6rem 1.2rem;
            text-transform: uppercase;
            font-size: 0.95rem;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #fff !important;
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .container {
            padding-top: 2rem;
            padding-bottom: 3rem;
        }

        .card {
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border: 1px solid var(--border-light);
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary-color) !important;
            color: white !important;
            padding: 1.5rem 2rem;
            border-bottom: none;
            font-weight: 700;
            border-top-left-radius: 1.25rem;
            border-top-right-radius: 1.25rem;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 2.5rem;
        }

        .btn {
            border-radius: 0.8rem;
            padding: 0.8rem 1.8rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: var(--primary-hover-color);
            border-color: var(--primary-hover-color);
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-info {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }
        .btn-info:hover {
            background-color: #148ea0;
            border-color: #148ea0;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: white;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        .form-control, .form-select, textarea.form-control {
            border-radius: 0.75rem;
            border: 1px solid var(--border-light);
            padding: 0.85rem 1.2rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus, textarea.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 86, 179, 0.25);
            background-color: #ffffff;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            border-radius: 1rem;
            padding: 1.5rem 2rem;
            margin-bottom: 2.5rem;
            font-weight: 600;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            font-size: 1.05rem;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            border-radius: 1rem;
            padding: 1.5rem 2rem;
            margin-bottom: 2.5rem;
            font-weight: 600;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            font-size: 1.05rem;
        }

        .pagination .page-link {
            border-radius: 0.6rem !important;
            margin: 0 0.3rem;
            transition: all 0.3s ease;
            color: var(--text-dark);
            border: 1px solid var(--border-light);
            padding: 0.7rem 1rem;
        }
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .pagination .page-link:hover {
            background-color: var(--primary-hover-color);
            color: white;
        }

        .table .table-primary {
            background-color: var(--primary-color) !important;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }
        .table th, .table td {
            vertical-align: middle;
            padding: 1rem;
        }
        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
            transition: all 0.2s ease-in-out;
        }
        .badge {
            font-size: 0.85em;
            padding: 0.5em 0.8em;
            border-radius: 0.5rem;
            font-weight: 600;
        }

        .text-primary-custom { color: var(--primary-color) !important; }
        .text-accent-custom { color: var(--accent-color) !important; }
        .text-success-custom { color: var(--success-color) !important; }
        .text-warning-custom { color: var(--warning-color) !important; }
        .text-danger-custom { color: var(--danger-color) !important; }

        .tooltip-inner {
            background-color: #333333;
            color: #fff;
            border-radius: 0.6rem;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .tooltip.bs-tooltip-auto[x-placement^=top] .tooltip-arrow::before, .tooltip.bs-tooltip-top .tooltip-arrow::before {
            border-top-color: #333333;
        }
        .tooltip.bs-tooltip-auto[x-placement^=bottom] .tooltip-arrow::before, .tooltip.bs-tooltip-bottom .tooltip-arrow::before {
            border-bottom-color: #333333;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Sistema Siegle Veículos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('vendedores.*') ? 'active' : '' }}" href="{{ route('vendedores.index') }}">Vendedores</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('carros.*') ? 'active' : '' }}" href="{{ route('carros.index') }}">Carros</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('compras.*') ? 'active' : '' }}" href="{{ route('compras.index') }}">Compras</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('vendas.*') ? 'active' : '' }}" href="{{ route('vendas.index') }}">Vendas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> Por favor, corrija os seguintes erros:
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</body>
</html>

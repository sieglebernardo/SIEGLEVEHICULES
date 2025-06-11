@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center text-center py-5">
    <h1 class="display-4 fw-bold text-dark mb-4">Bem-vindo ao sistema Siegle Veículos</h1>
    <p class="lead text-muted mb-5">Gerencie seus clientes, vendedores, carros, compras e vendas de forma eficiente.</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-primary"><i class="fas fa-users me-2"></i> Clientes</h5>
                    <p class="card-text text-muted">Gerencie as informações dos seus clientes.</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary mt-3 w-100">Ver Clientes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-success"><i class="fas fa-handshake me-2"></i> Vendedores</h5>
                    <p class="card-text text-muted">Acompanhe os dados dos seus vendedores.</p>
                    <a href="{{ route('vendedores.index') }}" class="btn btn-success mt-3 w-100">Ver Vendedores</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-info"><i class="fas fa-car me-2"></i> Carros</h5>
                    <p class="card-text text-muted">Visualize e edite sua frota de veículos.</p>
                    <a href="{{ route('carros.index') }}" class="btn btn-info mt-3 w-100">Ver Carros</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-warning"><i class="fas fa-shopping-cart me-2"></i> Compras</h5>
                    <p class="card-text text-muted">Gerencie as aquisições de veículos.</p>
                    <a href="{{ route('compras.index') }}" class="btn btn-warning mt-3 w-100">Ver Compras</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-danger"><i class="fas fa-receipt me-2"></i> Vendas</h5>
                    <p class="card-text text-muted">Acompanhe todas as suas transações de vendas.</p>
                    <a href="{{ route('vendas.index') }}" class="btn btn-danger mt-3 w-100">Ver Vendas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

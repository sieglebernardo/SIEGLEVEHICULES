@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Bem-vindo ao sistema Siegle Veículos</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="{{ route('clientes.index') }}" class="btn btn-primary w-100 py-3">Clientes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('vendedores.index') }}" class="btn btn-primary w-100 py-3">Vendedores</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('carros.index') }}" class="btn btn-primary w-100 py-3">Carros</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('compras.index') }}" class="btn btn-primary w-100 py-3">Compras</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('vendas.index') }}" class="btn btn-primary w-100 py-3">Vendas</a>
            </div>
        </div>
    </div>
@endsection

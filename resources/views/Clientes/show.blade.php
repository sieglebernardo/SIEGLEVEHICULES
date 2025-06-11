@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-user me-2"></i> Detalhes do Cliente: {{ $cliente->nome }}
            </h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="fas fa-id-badge me-2"></i> ID:</strong> {{ $cliente->id_cliente }}</p>
            <p class="card-text"><strong><i class="fas fa-address-card me-2"></i> CPF:</strong> {{ $cliente->cpf }}</p>
            <p class="card-text"><strong><i class="fas fa-phone me-2"></i> Telefone:</strong> {{ $cliente->telefone }}</p>
            <p class="card-text"><strong><i class="fas fa-envelope me-2"></i> Email:</strong> {{ $cliente->email }}</p>
            <p class="card-text"><strong><i class="fas fa-map-marker-alt me-2"></i> Endereço:</strong> {{ $cliente->endereco }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i> Editar Cliente
        </a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
</div>
@endsection

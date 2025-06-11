@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-user-tie me-2"></i> Detalhes do Vendedor: {{ $vendedor->nome }}
            </h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="fas fa-id-badge me-2"></i> ID:</strong> {{ $vendedor->id_vendedor }}</p>
            <p class="card-text"><strong><i class="fas fa-address-card me-2"></i> CPF:</strong> {{ $vendedor->cpf }}</p>
            <p class="card-text"><strong><i class="fas fa-phone me-2"></i> Telefone:</strong> {{ $vendedor->telefone }}</p>
            <p class="card-text"><strong><i class="fas fa-envelope me-2"></i> Email:</strong> {{ $vendedor->email }}</p>
            <p class="card-text"><strong><i class="fas fa-calendar-check me-2"></i> Data de Contratação:</strong> {{ \Carbon\Carbon::parse($vendedor->data_contratacao)->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('vendedores.edit', $vendedor->id_vendedor) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i> Editar Vendedor
        </a>
        <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
</div>
@endsection

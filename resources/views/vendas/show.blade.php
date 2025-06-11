@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-receipt me-2"></i> Detalhes da Venda #{{ $venda->id_venda }}
            </h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="fas fa-id-badge me-2"></i> ID:</strong> {{ $venda->id_venda }}</p>
            <p class="card-text"><strong><i class="fas fa-user me-2"></i> Cliente:</strong> {{ $venda->cliente->nome ?? 'N/A' }}</p>
            <p class="card-text"><strong><i class="fas fa-user-tie me-2"></i> Vendedor:</strong> {{ $venda->vendedor->nome ?? 'N/A' }}</p>
            <p class="card-text"><strong><i class="fas fa-car me-2"></i> Carro:</strong> {{ $venda->carro->marca ?? 'N/A' }} {{ $venda->carro->modelo ?? 'N/A' }} ({{ $venda->carro->placa ?? 'N/A' }})</p>
            <p class="card-text"><strong><i class="fas fa-calendar-alt me-2"></i> Data da Venda:</strong> {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>
            <p class="card-text"><strong><i class="fas fa-dollar-sign me-2"></i> Valor Pago:</strong> R$ {{ number_format($venda->valor_pago, 2, ',', '.') }}</p>
            <p class="card-text"><strong><i class="fas fa-credit-card me-2"></i> Forma de Pagamento:</strong> {{ $venda->forma_pagamento }}</p>
            <p class="card-text"><strong><i class="fas fa-comments me-2"></i> Observações:</strong> {{ $venda->observacoes ?? 'N/A' }}</p>
            <p class="card-text"><strong><i class="fas fa-minus-circle me-2"></i> Desconto:</strong> R$ {{ number_format($venda->desconto, 2, ',', '.') }}</p>
            <p class="card-text"><strong><i class="fas fa-shield-alt me-2"></i> Garantia (meses):</strong> {{ $venda->garantia_meses ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('vendas.edit', $venda->id_venda) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i> Editar Venda
        </a>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
</div>
@endsection

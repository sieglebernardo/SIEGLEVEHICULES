@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-file-invoice-dollar me-2"></i> Detalhes da Compra #{{ $compra->id_compra }}
            </h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="fas fa-id-badge me-2"></i> ID:</strong> {{ $compra->id_compra }}</p>
            <p class="card-text"><strong><i class="fas fa-industry me-2"></i> Fornecedor:</strong> {{ $compra->fornecedor }}</p>
            <p class="card-text"><strong><i class="fas fa-calendar-alt me-2"></i> Data da Compra:</strong> {{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y') }}</p>
            <p class="card-text"><strong><i class="fas fa-dollar-sign me-2"></i> Valor Pago:</strong> R$ {{ number_format($compra->valor_pago, 2, ',', '.') }}</p>
            <p class="card-text"><strong><i class="fas fa-credit-card me-2"></i> Forma de Pagamento:</strong> {{ $compra->forma_pagamento }}</p>
            <p class="card-text"><strong><i class="fas fa-comments me-2"></i> Observações:</strong> {{ $compra->observacoes ?? 'N/A' }}</p> {{-- Adicionado 'N/A' se for nulo --}}
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('compras.edit', $compra->id_compra) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i> Editar Compra
        </a>
        <a href="{{ route('compras.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">Detalhes do Carro #{{ $carro->id_carro }}</h1>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="fas fa-tag me-2"></i> ID:</strong> {{ $carro->id_carro }}</p>
            <p class="card-text"><strong><i class="fas fa-shopping-basket me-2"></i> Compra (Fornecedor):</strong> {{ $carro->compra->fornecedor ?? 'N/A' }}</p>
            <p class="card-text"><strong><i class="fas fa-car-side me-2"></i> Marca:</strong> {{ $carro->marca }}</p>
            <p class="card-text"><strong><i class="fas fa-car me-2"></i> Modelo:</strong> {{ $carro->modelo }}</p>
            <p class="card-text"><strong><i class="fas fa-calendar-alt me-2"></i> Ano:</strong> {{ $carro->ano }}</p>
            <p class="card-text"><strong><i class="fas fa-palette me-2"></i> Cor:</strong> {{ $carro->cor }}</p>
            <p class="card-text"><strong><i class="fas fa-id-card me-2"></i> Placa:</strong> {{ $carro->placa }}</p>
            <p class="card-text"><strong><i class="fas fa-dollar-sign me-2"></i> Preço:</strong> R$ {{ number_format($carro->preco, 2, ',', '.') }}</p>
            <p class="card-text">
                <strong><i class="fas fa-info-circle me-2"></i> Status:</strong> 
                @if($carro->status == 'Disponível')
                    <span class="badge bg-success">{{ $carro->status }}</span>
                @elseif($carro->status == 'Vendido')
                    <span class="badge bg-danger">{{ $carro->status }}</span>
                @else
                    <span class="badge bg-secondary">{{ $carro->status }}</span>
                @endif
            </p>
            <p class="card-text"><strong><i class="fas fa-tachometer-alt me-2"></i> Quilometragem:</strong> {{ number_format($carro->kilometragem, 0, ',', '.') }} km</p>
            <p class="card-text"><strong><i class="fas fa-file-invoice me-2"></i> Renavam:</strong> {{ $carro->renavam }}</p>
            <p class="card-text"><strong><i class="fas fa-gas-pump me-2"></i> Tipo de Combustível:</strong> {{ $carro->tipo_combustivel }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('carros.edit', $carro->id_carro) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i> Editar Carro
        </a>
        <a href="{{ route('carros.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
</div>
@endsection

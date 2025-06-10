@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Carro</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $carro->id_carro }}</p>
            <p><strong>Compra:</strong> {{ $carro->id_compra }}</p>
            <p><strong>Marca:</strong> {{ $carro->marca }}</p>
            <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
            <p><strong>Ano:</strong> {{ $carro->ano }}</p>
            <p><strong>Cor:</strong> {{ $carro->cor }}</p>
            <p><strong>Placa:</strong> {{ $carro->placa }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($carro->preco, 2, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $carro->status }}</p>
            <p><strong>Quilometragem:</strong> {{ $carro->kilometragem }} km</p>
            <p><strong>Renavam:</strong> {{ $carro->renavam }}</p>
            <p><strong>Tipo de Combustível:</strong> {{ $carro->tipo_combustivel }}</p>
        </div>
    </div>

    <a href="{{ route('carros.index') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection

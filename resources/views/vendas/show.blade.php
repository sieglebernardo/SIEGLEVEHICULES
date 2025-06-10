@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Venda</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Venda #{{ $venda->id }}</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $venda->cliente->nome }}</p>
            <p class="card-text"><strong>Vendedor:</strong> {{ $venda->vendedor->nome }}</p>
            <p class="card-text"><strong>Carro:</strong> {{ $venda->carro->modelo }}</p>
            <p class="card-text"><strong>Data da Venda:</strong> {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Valor:</strong> R$ {{ number_format($venda->valor, 2, ',', '.') }}</p>

            <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection

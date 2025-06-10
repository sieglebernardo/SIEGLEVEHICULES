@extends('layouts.app')

@section('content')
    <h1>Compra #{{ $compra->id_compra }}</h1>

    <p><strong>Fornecedor:</strong> {{ $compra->fornecedor }}</p>
    <p><strong>Data:</strong> {{ $compra->data_compra }}</p>
    <p><strong>Valor Pago:</strong> R$ {{ number_format($compra->valor_pago, 2, ',', '.') }}</p>
    <p><strong>Forma de Pagamento:</strong> {{ $compra->forma_pagamento }}</p>
    <p><strong>Observações:</strong> {{ $compra->observacoes }}</p>

    <a href="{{ route('compras.edit', $compra) }}">Editar</a> |
    <a href="{{ route('compras.index') }}">Voltar</a>
@endsection

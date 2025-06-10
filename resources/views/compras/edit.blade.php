@extends('layouts.app')

@section('content')
    <h1>{{ isset($compra) ? 'Editar Compra' : 'Nova Compra' }}</h1>

    <form method="POST" action="{{ isset($compra) ? route('compras.update', $compra) : route('compras.store') }}">
        @csrf
        @if(isset($compra))
            @method('PUT')
        @endif

        <label>Fornecedor:</label><br>
        <input type="text" name="fornecedor" value="{{ old('fornecedor', $compra->fornecedor ?? '') }}"><br>

        <label>Data da Compra:</label><br>
        <input type="date" name="data_compra" value="{{ old('data_compra', $compra->data_compra ?? '') }}"><br>

        <label>Valor Pago:</label><br>
        <input type="number" name="valor_pago" step="0.01" value="{{ old('valor_pago', $compra->valor_pago ?? '') }}"><br>

        <label>Forma de Pagamento:</label><br>
        <input type="text" name="forma_pagamento" value="{{ old('forma_pagamento', $compra->forma_pagamento ?? '') }}"><br>

        <label>Observações:</label><br>
        <textarea name="observacoes">{{ old('observacoes', $compra->observacoes ?? '') }}</textarea><br><br>

        <button type="submit">Salvar</button>
        <a href="{{ route('compras.index') }}">Cancelar</a>
    </form>
@endsection

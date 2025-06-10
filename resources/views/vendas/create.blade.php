@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Venda</h1>

    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-select @error('id_cliente') is-invalid @enderror" required>
                <option value="">Selecione</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
            @error('id_cliente')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_vendedor" class="form-label">Vendedor</label>
            <select name="id_vendedor" id="id_vendedor" class="form-select @error('id_vendedor') is-invalid @enderror" required>
                <option value="">Selecione</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->id_vendedor }}" {{ old('id_vendedor') == $vendedor->id_vendedor ? 'selected' : '' }}>
                        {{ $vendedor->nome }}
                    </option>
                @endforeach
            </select>
            @error('id_vendedor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_carro" class="form-label">Carro</label>
            <select name="id_carro" id="id_carro" class="form-select @error('id_carro') is-invalid @enderror" required>
                <option value="">Selecione</option>
                @foreach($carros as $carro)
                    <option value="{{ $carro->id_carro }}" {{ old('id_carro') == $carro->id_carro ? 'selected' : '' }}>
                        {{ $carro->marca }} {{ $carro->modelo }} ({{ $carro->placa }})
                    </option>
                @endforeach
            </select>
            @error('id_carro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data_venda" class="form-label">Data da Venda</label>
            <input type="date" name="data_venda" id="data_venda" class="form-control @error('data_venda') is-invalid @enderror" value="{{ old('data_venda') }}" required>
            @error('data_venda')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="valor_pago" class="form-label">Valor Pago</label>
            <input type="number" step="0.01" name="valor_pago" id="valor_pago" class="form-control @error('valor_pago') is-invalid @enderror" value="{{ old('valor_pago') }}" required>
            @error('valor_pago')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <input type="text" name="forma_pagamento" id="forma_pagamento" class="form-control @error('forma_pagamento') is-invalid @enderror" value="{{ old('forma_pagamento') }}" required>
            @error('forma_pagamento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control @error('observacoes') is-invalid @enderror">{{ old('observacoes') }}</textarea>
            @error('observacoes')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="desconto" class="form-label">Desconto</label>
            <input type="number" step="0.01" name="desconto" id="desconto" class="form-control @error('desconto') is-invalid @enderror" value="{{ old('desconto', 0) }}">
            @error('desconto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="garantia_meses" class="form-label">Garantia (meses)</label>
            <input type="number" name="garantia_meses" id="garantia_meses" class="form-control @error('garantia_meses') is-invalid @enderror" value="{{ old('garantia_meses', 0) }}">
            @error('garantia_meses')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

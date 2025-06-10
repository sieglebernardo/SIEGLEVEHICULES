@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vendas.update', $venda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-control">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $venda->cliente_id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vendedor_id" class="form-label">Vendedor</label>
            <select name="vendedor_id" class="form-control">
                @foreach ($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}" {{ old('vendedor_id', $venda->vendedor_id) == $vendedor->id ? 'selected' : '' }}>
                        {{ $vendedor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="carro_id" class="form-label">Carro</label>
            <select name="carro_id" class="form-control">
                @foreach ($carros as $carro)
                    <option value="{{ $carro->id }}" {{ old('carro_id', $venda->carro_id) == $carro->id ? 'selected' : '' }}>
                        {{ $carro->modelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_venda" class="form-label">Data da Venda</label>
            <input type="date" name="data_venda" class="form-control" value="{{ old('data_venda', $venda->data_venda) }}">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control" value="{{ old('valor', $venda->valor) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

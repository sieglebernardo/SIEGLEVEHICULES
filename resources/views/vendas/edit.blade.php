@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-edit me-2"></i> Editar Venda
            </h1>
        </div>
        <div class="card-body">
            {{-- Removido o bloco de @error global aqui, pois já está no layouts.app --}}

            <form action="{{ route('vendas.update', $venda->id_venda) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-select" required>
                        <option value="">Selecione um Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" {{ old('cliente_id', $venda->id_cliente) == $cliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('cliente_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="vendedor_id" class="form-label">Vendedor</label>
                    <select name="vendedor_id" id="vendedor_id" class="form-select" required>
                        <option value="">Selecione um Vendedor</option>
                        @foreach ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id_vendedor }}" {{ old('vendedor_id', $venda->id_vendedor) == $vendedor->id_vendedor ? 'selected' : '' }}>
                                {{ $vendedor->nome }}
                            </option>
                        @endforeach
                    </select>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('vendedor_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="carro_id" class="form-label">Carro</label>
                    <select name="carro_id" id="carro_id" class="form-select" required>
                        <option value="">Selecione um Carro</option>
                        @foreach ($carros as $carro)
                            <option value="{{ $carro->id_carro }}" {{ old('carro_id', $venda->id_carro) == $carro->id_carro ? 'selected' : '' }}>
                                {{ $carro->marca }} {{ $carro->modelo }} ({{ $carro->placa }}) - {{ $carro->status }}
                            </option>
                        @endforeach
                    </select>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('carro_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="data_venda" class="form-label">Data da Venda</label>
                    <input type="date" name="data_venda" id="data_venda" class="form-control" value="{{ old('data_venda', $venda->data_venda) }}" required>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('data_venda')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="valor_pago" class="form-label">Valor Pago</label>
                    <input type="number" step="0.01" name="valor_pago" id="valor_pago" class="form-control" value="{{ old('valor_pago', $venda->valor_pago) }}" required>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('valor_pago')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                    <select name="forma_pagamento" id="forma_pagamento" class="form-select" required>
                        <option value="">Selecione a Forma de Pagamento</option>
                        <option value="Dinheiro" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                        <option value="Cartão de Crédito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
                        <option value="Cartão de Débito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
                        <option value="Pix" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Pix' ? 'selected' : '' }}>Pix</option>
                        <option value="Transferência Bancária" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Transferência Bancária' ? 'selected' : '' }}>Transferência Bancária</option>
                    </select>
                    {{-- BLOCO DE ERRO ESPECÍFICO REMOVIDO/COMENTADO --}}
                    {{-- @error('forma_pagamento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea name="observacoes" id="observacoes" class="form-control">{{ old('observacoes', $venda->observacoes ?? '') }}</textarea>
                    {{-- @error('observacoes')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                </div>

                <div class="mb-3">
                    <label for="desconto" class="form-label">Desconto</label>
                    <input type="number" step="0.01" name="desconto" id="desconto" class="form-control" value="{{ old('desconto', $venda->desconto ?? 0) }}">
                    {{-- @error('desconto')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                </div>

                <div class="mb-3">
                    <label for="garantia_meses" class="form-label">Garantia (meses)</label>
                    <input type="number" name="garantia_meses" id="garantia_meses" class="form-control" value="{{ old('garantia_meses', $venda->garantia_meses ?? 0) }}">
                    {{-- @error('garantia_meses')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt me-2"></i> Atualizar</button>
                    <a href="{{ route('vendas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-{{ isset($compra) ? 'file-invoice-dollar' : 'cart-plus' }} me-2"></i>
                {{ isset($compra) ? 'Editar Compra' : 'Nova Compra' }}
            </h1>
        </div>
        <div class="card-body">
            {{-- Removido o bloco de @error global aqui, pois já está no layouts.app --}}

            <form method="POST" action="{{ isset($compra) ? route('compras.update', $compra->id_compra) : route('compras.store') }}">
                @csrf
                @if(isset($compra))
                    @method('PUT')
                @endif

                {{-- Campo Fornecedor --}}
                <div class="mb-3">
                    <label for="fornecedor" class="form-label">Fornecedor:</label>
                    <input type="text" name="fornecedor" id="fornecedor" class="form-control" value="{{ old('fornecedor', $compra->fornecedor ?? '') }}" required>
                    {{-- @error('fornecedor')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Data da Compra --}}
                <div class="mb-3">
                    <label for="data_compra" class="form-label">Data da Compra:</label>
                    <input type="date" name="data_compra" id="data_compra" class="form-control" value="{{ old('data_compra', $compra->data_compra ?? '') }}" required>
                    {{-- @error('data_compra')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Valor Pago --}}
                <div class="mb-3">
                    <label for="valor_pago" class="form-label">Valor Pago:</label>
                    <input type="number" name="valor_pago" id="valor_pago" class="form-control" step="0.01" value="{{ old('valor_pago', $compra->valor_pago ?? '') }}" required>
                    {{-- @error('valor_pago')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Forma de Pagamento --}}
                <div class="mb-3">
                    <label for="forma_pagamento" class="form-label">Forma de Pagamento:</label>
                    <select name="forma_pagamento" id="forma_pagamento" class="form-select" required>
                        <option value="">Selecione a Forma de Pagamento</option>
                        <option value="Dinheiro" {{ old('forma_pagamento', $compra->forma_pagamento ?? '') == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                        <option value="Cartão de Crédito" {{ old('forma_pagamento', $compra->forma_pagamento ?? '') == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
                        <option value="Cartão de Débito" {{ old('forma_pagamento', $compra->forma_pagamento ?? '') == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
                        <option value="Pix" {{ old('forma_pagamento', $compra->forma_pagamento ?? '') == 'Pix' ? 'selected' : '' }}>Pix</option>
                        <option value="Transferência Bancária" {{ old('forma_pagamento', $compra->forma_pagamento ?? '') == 'Transferência Bancária' ? 'selected' : '' }}>Transferência Bancária</option>
                        {{-- Adicione outras opções conforme necessário --}}
                    </select>
                    {{-- @error('forma_pagamento')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Observações --}}
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações:</label>
                    <textarea name="observacoes" id="observacoes" class="form-control">{{ old('observacoes', $compra->observacoes ?? '') }}</textarea>
                    {{-- @error('observacoes')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                    <a href="{{ route('compras.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

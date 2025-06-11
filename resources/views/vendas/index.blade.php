@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Lista de Vendas</h1>
        <a href="{{ route('vendas.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i> Nova Venda
        </a>
    </div>

    {{-- Removido o bloco de session('success') aqui, pois já está no layouts.app --}}

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr class="table-primary">
                            <th>ID Venda</th>
                            <th>Cliente</th> {{-- Adicionado --}}
                            <th>Vendedor</th> {{-- Adicionado --}}
                            <th>Carro</th> {{-- Adicionado --}}
                            <th>Data Venda</th>
                            <th>Valor Pago</th> {{-- Ajustado --}}
                            <th>Forma Pagamento</th>
                            <th>Observações</th> {{-- Adicionado --}}
                            <th>Desconto</th> {{-- Adicionado --}}
                            <th>Garantia (meses)</th> {{-- Adicionado --}}
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendas as $venda)
                            <tr>
                                <td>{{ $venda->id_venda }}</td>
                                <td>{{ $venda->cliente->nome ?? 'N/A' }}</td> {{-- Mostra o nome do cliente --}}
                                <td>{{ $venda->vendedor->nome ?? 'N/A' }}</td> {{-- Mostra o nome do vendedor --}}
                                <td>{{ $venda->carro->modelo ?? 'N/A' }}</td> {{-- Mostra o modelo do carro --}}
                                <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                                <td>R$ {{ number_format($venda->valor_pago, 2, ',', '.') }}</td>
                                <td>{{ $venda->forma_pagamento }}</td>
                                <td>{{ $venda->observacoes ?? 'N/A' }}</td>
                                <td>R$ {{ number_format($venda->desconto, 2, ',', '.') }}</td>
                                <td>{{ $venda->garantia_meses ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('vendas.show', $venda->id_venda) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('vendas.edit', $venda->id_venda) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Venda">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta venda?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Venda">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center py-4">Nenhuma venda encontrada.</td> {{-- Colspan ajustado --}}
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $vendas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

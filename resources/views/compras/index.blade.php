@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Lista de Compras</h1>
        <a href="{{ route('compras.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i> Nova Compra
        </a>
    </div>

    {{-- Removido o bloco de session('success') aqui, pois já está no layouts.app --}}

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr class="table-primary">
                            <th>ID</th>
                            <th>Fornecedor</th>
                            <th>Data</th>
                            <th>Valor Pago</th>
                            <th>Forma de Pagamento</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($compras as $compra)
                            <tr>
                                <td>{{ $compra->id_compra }}</td> {{-- Mantido id_compra --}}
                                <td>{{ $compra->fornecedor }}</td>
                                <td>{{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y') }}</td> {{-- Formatado --}}
                                <td>R$ {{ number_format($compra->valor_pago, 2, ',', '.') }}</td>
                                <td>{{ $compra->forma_pagamento }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('compras.show', $compra->id_compra) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('compras.edit', $compra->id_compra) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Compra">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('compras.destroy', $compra->id_compra) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta compra?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Compra">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Nenhuma compra encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $compras->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Lista de Carros</h1>
        <a href="{{ route('carros.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i> Novo Carro
        </a>
    </div>

    {{-- Removido o bloco de session('success') aqui, pois já está no layouts.app --}}

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0"> {{-- Classes Bootstrap para tabela --}}
                    <thead>
                        <tr class="table-primary"> {{-- Cor de fundo para o cabeçalho --}}
                            <th>ID</th>
                            <th>Compra (Fornecedor)</th> {{-- Ajustado para mostrar o fornecedor --}}
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Cor</th>
                            <th>Placa</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th>Kilometragem</th>
                            <th>Renavam</th>
                            <th>Combustível</th>
                            <th class="text-center">Ações</th> {{-- Centralizado --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carros as $carro) {{-- Usando @forelse para quando não houver carros --}}
                            <tr>
                                <td>{{ $carro->id_carro }}</td>
                                <td>{{ $carro->compra->fornecedor ?? 'N/A' }}</td>
                                <td>{{ $carro->marca }}</td>
                                <td>{{ $carro->modelo }}</td>
                                <td>{{ $carro->ano }}</td>
                                <td>{{ $carro->cor }}</td>
                                <td>{{ $carro->placa }}</td>
                                <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                                <td>
                                    {{-- Estilização de status para melhor visualização --}}
                                    @if($carro->status == 'Disponível')
                                        <span class="badge bg-success">{{ $carro->status }}</span>
                                    @elseif($carro->status == 'Vendido')
                                        <span class="badge bg-danger">{{ $carro->status }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $carro->status }}</span>
                                    @endif
                                </td>
                                <td>{{ number_format($carro->kilometragem, 0, ',', '.') }} km</td> {{-- Formatado --}}
                                <td>{{ $carro->renavam }}</td>
                                <td>{{ $carro->tipo_combustivel }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2"> {{-- Botões lado a lado --}}
                                        <a href="{{ route('carros.show', $carro->id_carro) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('carros.edit', $carro->id_carro) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Carro">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('carros.destroy', $carro->id_carro) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este carro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Carro">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center py-4">Nenhum carro encontrado.</td> {{-- Colspan ajustado --}}
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $carros->links('pagination::bootstrap-5') }} {{-- Estiliza a paginação com Bootstrap 5 --}}
    </div>
</div>
@endsection

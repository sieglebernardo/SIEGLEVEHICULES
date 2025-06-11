@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Lista de Vendedores</h1>
        <a href="{{ route('vendedores.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i> Novo Vendedor
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
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Data de Contratação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendedores as $vendedor)
                            <tr>
                                <td>{{ $vendedor->id_vendedor }}</td>
                                <td>{{ $vendedor->nome }}</td>
                                <td>{{ $vendedor->cpf }}</td>
                                <td>{{ $vendedor->telefone }}</td>
                                <td>{{ $vendedor->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($vendedor->data_contratacao)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('vendedores.show', $vendedor->id_vendedor) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('vendedores.edit', $vendedor->id_vendedor) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Vendedor">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('vendedores.destroy', $vendedor->id_vendedor) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este vendedor?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Vendedor">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Nenhum vendedor encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $vendedores->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

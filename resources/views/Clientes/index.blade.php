@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Lista de Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i> Novo Cliente
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
                            <th>Endereço</th> {{-- Adicionei o Endereço para ficar mais completo --}}
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id_cliente }}</td> {{-- Mantido id_cliente --}}
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('clientes.show', $cliente->id_cliente) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Cliente">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Cliente">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Nenhum cliente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $clientes->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

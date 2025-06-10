@extends('layouts.app')

@section('content')
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}">Novo Cliente</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Email</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente) }}">Ver</a> |
                        <a href="{{ route('clientes.edit', $cliente) }}">Editar</a> |
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clientes->links() }}
@endsection

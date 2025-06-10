@extends('layouts.app')

@section('content')
    <h1>Vendedores</h1>
    <a href="{{ route('vendedores.create') }}">Novo Vendedor</a>

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
            @foreach($vendedores as $vendedor)
                <tr>
                    <td>{{ $vendedor->id_vendedor }}</td>
                    <td>{{ $vendedor->nome }}</td>
                    <td>{{ $vendedor->cpf }}</td>
                    <td>{{ $vendedor->telefone }}</td>
                    <td>{{ $vendedor->email }}</td>
                    <td>
                        <a href="{{ route('vendedores.show', $vendedor) }}">Ver</a> |
                        <a href="{{ route('vendedores.edit', $vendedor) }}">Editar</a> |
                        <form action="{{ route('vendedores.destroy', $vendedor) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vendedores->links() }}
@endsection

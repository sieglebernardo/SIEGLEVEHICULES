@extends('layouts.app')

@section('content')
    <h1>Compras</h1>
    <a href="{{ route('compras.create') }}">Nova Compra</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th><th>Fornecedor</th><th>Data</th><th>Valor Pago</th><th>Forma de Pagamento</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->id_compra }}</td>
                    <td>{{ $compra->fornecedor }}</td>
                    <td>{{ $compra->data_compra }}</td>
                    <td>R$ {{ number_format($compra->valor_pago, 2, ',', '.') }}</td>
                    <td>{{ $compra->forma_pagamento }}</td>
                    <td>
                        <a href="{{ route('compras.show', $compra) }}">Ver</a> |
                        <a href="{{ route('compras.edit', $compra) }}">Editar</a> |
                        <form action="{{ route('compras.destroy', $compra) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $compras->links() }}
@endsection

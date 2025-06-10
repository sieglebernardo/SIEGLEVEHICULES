@extends('layouts.app')

@section('content')
    <h1>Lista de Carros</h1>

    <a href="{{ route('carros.create') }}">Novo Carro</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Compra</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Placa</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Kilometragem</th>
                <th>Renavam</th>
                <th>Tipo Combustível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->id_carro }}</td>
                    <td>{{ $carro->compra->fornecedor ?? 'N/A' }}</td>
                    <td>{{ $carro->marca }}</td>
                    <td>{{ $carro->modelo }}</td>
                    <td>{{ $carro->ano }}</td>
                    <td>{{ $carro->cor }}</td>
                    <td>{{ $carro->placa }}</td>
                    <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                    <td>{{ $carro->status }}</td>
                    <td>{{ $carro->kilometragem }}</td>
                    <td>{{ $carro->renavam }}</td>
                    <td>{{ $carro->tipo_combustivel }}</td>
                    <td>
                        <a href="{{ route('carros.show', $carro->id_carro) }}">Ver</a> |
                        <a href="{{ route('carros.edit', $carro->id_carro) }}">Editar</a> |
                        <form action="{{ route('carros.destroy', $carro->id_carro) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirma exclusão?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $carros->links() }}
@endsection

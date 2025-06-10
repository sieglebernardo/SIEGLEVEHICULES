@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vendas</h1>

    <a href="{{ route('vendas.create') }}" class="btn btn-success mb-3">Nova Venda</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($vendas->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Carro</th>
                <th>Data da Venda</th>
                <th>Valor Pago</th>
                <th>Desconto</th>
                <th>Garantia (meses)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->id_venda }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->vendedor->nome }}</td>
                    <td>{{ $venda->carro->modelo }} ({{ $venda->carro->placa }})</td>
                    <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($venda->valor_pago, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($venda->desconto ?? 0, 2, ',', '.') }}</td>
                    <td>{{ $venda->garantia_meses }}</td>
                    <td>
                        <a href="{{ route('vendas.show', $venda->id_venda) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('vendas.edit', $venda->id_venda) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirma exclusão?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vendas->links() }}

    @else
    <p>Nenhuma venda encontrada.</p>
    @endif
</div>
@endsection

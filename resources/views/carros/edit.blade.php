@extends('layouts.app')

@section('content')
    <h1>Editar Carro #{{ $carro->id_carro }}</h1>

    <form action="{{ route('carros.update', $carro->id_carro) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_compra">Compra:</label>
        <select name="id_compra" id="id_compra" required>
            <option value="">Selecione a compra</option>
            @foreach($compras as $compra)
                <option value="{{ $compra->id_compra }}" {{ (old('id_compra', $carro->id_compra) == $compra->id_compra) ? 'selected' : '' }}>
                    {{ $compra->fornecedor }} - {{ $compra->data_compra }}
                </option>
            @endforeach
        </select>
        @error('id_compra')<div>{{ $message }}</div>@enderror

        <br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{ old('marca', $carro->marca) }}" required>
        @error('marca')<div>{{ $message }}</div>@enderror

        <br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $carro->modelo) }}" required>
        @error('modelo')<div>{{ $message }}</div>@enderror

        <br>

        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="{{ old('ano', $carro->ano) }}" required min="1900" max="{{ date('Y') }}">
        @error('ano')<div>{{ $message }}</div>@enderror

        <br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" id="cor" value="{{ old('cor', $carro->cor) }}" required>
        @error('cor')<div>{{ $message }}</div>@enderror

        <br>

        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" value="{{ old('placa', $carro->placa) }}" required>
        @error('placa')<div>{{ $message }}</div>@enderror

        <br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="{{ old('preco', $carro->preco) }}" step="0.01" min="0" required>
        @error('preco')<div>{{ $message }}</div>@enderror

        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="">Selecione</option>
            <option value="Disponível" {{ old('status', $carro->status) == 'Disponível' ? 'selected' : '' }}>Disponível</option>
            <option value="Vendido" {{ old('status', $carro->status) == 'Vendido' ? 'selected' : '' }}>Vendido</option>
            <option value="Indisponível" {{ old('status', $carro->status) == 'Indisponível' ? 'selected' : '' }}>Indisponível</option>
        </select>
        @error('status')<div>{{ $message }}</div>@enderror

        <br>

        <label for="kilometragem">Kilometragem:</label>
        <input type="number" name="kilometragem" id="kilometragem" value="{{ old('kilometragem', $carro->kilometragem) }}" min="0" required>
        @error('kilometragem')<div>{{ $message }}</div>@enderror

        <br>

        <label for="renavam">Renavam:</label>
        <input type="text" name="renavam" id="renavam" value="{{ old('renavam', $carro->renavam) }}" required>
        @error('renavam')<div>{{ $message }}</div>@enderror

        <br>

        <label for="tipo_combustivel">Tipo Combustível:</label>
        <input type="text" name="tipo_combustivel" id="tipo_combustivel" value="{{ old('tipo_combustivel', $carro->tipo_combustivel) }}" required>
        @error('tipo_combustivel')<div>{{ $message }}</div>@enderror

        <br>

        <button type="submit">Atualizar</button>
        <a href="{{ route('carros.index') }}">Cancelar</a>
    </form>
@endsection

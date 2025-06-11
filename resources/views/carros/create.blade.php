@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">Novo Carro</h1>
        </div>
        <div class="card-body">
            {{-- Removido o bloco de @error global aqui, pois já está no layouts.app --}}

            <form action="{{ route('carros.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_compra" class="form-label">Compra:</label>
                    <select name="id_compra" id="id_compra" class="form-select" required>
                        <option value="">Selecione a compra</option>
                        @foreach($compras as $compra)
                            <option value="{{ $compra->id_compra }}" {{ old('id_compra') == $compra->id_compra ? 'selected' : '' }}>
                                {{ $compra->fornecedor }} - {{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_compra')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca') }}" required>
                    @error('marca')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo') }}" required>
                    @error('modelo')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="ano" class="form-label">Ano:</label>
                    <input type="number" name="ano" id="ano" class="form-control" value="{{ old('ano') }}" required min="1900" max="{{ date('Y') }}">
                    @error('ano')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="cor" class="form-label">Cor:</label>
                    <input type="text" name="cor" id="cor" class="form-control" value="{{ old('cor') }}" required>
                    @error('cor')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="placa" class="form-label">Placa:</label>
                    <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa') }}" required>
                    @error('placa')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="number" name="preco" id="preco" class="form-control" value="{{ old('preco') }}" step="0.01" min="0" required>
                    @error('preco')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">Selecione</option>
                        <option value="Disponível" {{ old('status') == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                        <option value="Vendido" {{ old('status') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                        <option value="Indisponível" {{ old('status') == 'Indisponível' ? 'selected' : '' }}>Indisponível</option>
                    </select>
                    @error('status')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="kilometragem" class="form-label">Kilometragem:</label>
                    <input type="number" name="kilometragem" id="kilometragem" class="form-control" value="{{ old('kilometragem') }}" min="0" required>
                    @error('kilometragem')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="renavam" class="form-label">Renavam:</label>
                    <input type="text" name="renavam" id="renavam" class="form-control" value="{{ old('renavam') }}" required>
                    @error('renavam')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="tipo_combustivel" class="form-label">Tipo Combustível:</label>
                    <input type="text" name="tipo_combustivel" id="tipo_combustivel" class="form-control" value="{{ old('tipo_combustivel') }}" required>
                    @error('tipo_combustivel')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Salvar</button>
                    <a href="{{ route('carros.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

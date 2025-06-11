@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 card-title mb-0">
                <i class="fas fa-{{ isset($vendedor) ? 'user-edit' : 'user-plus' }} me-2"></i>
                {{ isset($vendedor) ? 'Editar Vendedor' : 'Novo Vendedor' }}
            </h1>
        </div>
        <div class="card-body">
            {{-- Removido o bloco de @error global aqui, pois já está no layouts.app --}}

            <form method="POST" action="{{ isset($vendedor) ? route('vendedores.update', $vendedor->id_vendedor) : route('vendedores.store') }}">
                @csrf
                @if(isset($vendedor))
                    @method('PUT')
                @endif

                {{-- Campo Nome --}}
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $vendedor->nome ?? '') }}" required>
                    {{-- @error('nome')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo CPF --}}
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $vendedor->cpf ?? '') }}" required>
                    {{-- @error('cpf')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Telefone --}}
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $vendedor->telefone ?? '') }}" required>
                    {{-- @error('telefone')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $vendedor->email ?? '') }}" required>
                    {{-- @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                {{-- Campo Data de Contratação --}}
                <div class="mb-3">
                    <label for="data_contratacao" class="form-label">Data de Contratação:</label>
                    <input type="date" name="data_contratacao" id="data_contratacao" class="form-control" value="{{ old('data_contratacao', $vendedor->data_contratacao ?? '') }}" required>
                    {{-- @error('data_contratacao')<div class="text-danger mt-1">{{ $message }}</div>@enderror --}}
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                    <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
